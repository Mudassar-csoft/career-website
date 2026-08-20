<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Concerns\BuildsDashboardMenu;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class BlogController extends Controller
{
    use BuildsDashboardMenu;

    public function index()
    {
        return view('dashboard.blogs.index', [
            'screens' => $this->screens(),
            'active' => 'blogs',
            'blogs' => Blog::latest()->get(),
        ]);
    }

    public function create()
    {
        return view('dashboard.blogs.create', [
            'screens' => $this->screens(),
            'active' => 'blogs',
            'blog' => new Blog,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $this->validateBlog($request);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('blogs', 'public');
        }

        Blog::create($validated);

        return redirect()->route('dashboard.blogs.index')->with('status', 'Blog published.');
    }

    public function edit(Blog $blog)
    {
        return view('dashboard.blogs.edit', [
            'screens' => $this->screens(),
            'active' => 'blogs',
            'blog' => $blog,
        ]);
    }

    public function update(Request $request, Blog $blog)
    {
        $validated = $this->validateBlog($request, $blog);
        $previousImagePath = $blog->resolveImagePath();

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('blogs', 'public');
        }

        $blog->update($validated);

        if ($request->hasFile('image') && $previousImagePath !== null && $previousImagePath !== $blog->resolveImagePath()) {
            Storage::disk('public')->delete($previousImagePath);
        }

        return redirect()->route('dashboard.blogs.index')->with('status', 'Blog updated.');
    }

    public function destroy(Blog $blog)
    {
        if ($path = $blog->resolveImagePath()) {
            Storage::disk('public')->delete($path);
        }

        $blog->delete();

        return redirect()->route('dashboard.blogs.index')->with('status', 'Blog deleted.');
    }

    protected function validateBlog(Request $request, ?Blog $blog = null): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'alpha_dash', 'unique:blogs,slug,'.($blog->id ?? 'NULL').',id'],
            'excerpt' => ['nullable', 'string', 'max:255'],
            'content' => ['nullable', 'string'],
            'image' => [Rule::requiredIf(! $blog || ! $blog->image), 'nullable', 'image', 'max:4096'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:500'],
            'meta_keywords' => ['nullable', 'string', 'max:255'],
        ]);
    }
}
