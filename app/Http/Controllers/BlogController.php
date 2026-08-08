<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Concerns\BuildsDashboardMenu;
use App\Models\Blog;
use Illuminate\Http\Request;

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

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('blogs', 'public');
        }

        $blog->update($validated);

        return redirect()->route('dashboard.blogs.index')->with('status', 'Blog updated.');
    }

    public function destroy(Blog $blog)
    {
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
            'image' => ['nullable', 'image', 'max:4096'],
        ]);
    }
}
