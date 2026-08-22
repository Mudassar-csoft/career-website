<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Concerns\BuildsDashboardMenu;
use App\Models\Blog;
use App\Support\DashboardImageUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
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

        $images = Arr::pull($validated, 'images', []);
        $blog = Blog::create($validated);
        $this->storeImages($blog, $images);

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
        $images = Arr::pull($validated, 'images', []);

        $blog->update($validated);
        $this->storeImages($blog, $images);

        return redirect()->route('dashboard.blogs.index')->with('status', 'Blog updated.');
    }

    public function destroy(Blog $blog)
    {
        $paths = $blog->images()
            ->get()
            ->map(fn ($image) => $image->resolveImagePath())
            ->filter()
            ->when($blog->resolveImagePath(), fn ($items, $path) => $items->push($path))
            ->unique();

        Storage::disk('public')->delete($paths->all());

        $blog->delete();

        return redirect()->route('dashboard.blogs.index')->with('status', 'Blog deleted.');
    }

    protected function validateBlog(Request $request, ?Blog $blog = null): array
    {
        $hasExistingImages = $blog && ($blog->image || $blog->images()->exists());

        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'alpha_dash', 'unique:blogs,slug,'.($blog->id ?? 'NULL').',id'],
            'excerpt' => ['nullable', 'string', 'max:255'],
            'content' => ['nullable', 'string'],
            'images' => [Rule::requiredIf(! $hasExistingImages), 'nullable', 'array', 'min:1'],
            'images.*' => DashboardImageUpload::rulesWithDimensions(1920, 1080),
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:500'],
            'meta_keywords' => ['nullable', 'string', 'max:255'],
        ]);
    }

    private function storeImages(Blog $blog, array $files): void
    {
        if (empty($files)) {
            return;
        }

        $nextSortOrder = ((int) $blog->images()->max('sort_order')) + 1;

        // Preserve a pre-slider cover image as the first slide when appending new images.
        if ($nextSortOrder === 1 && ($legacyPath = $blog->resolveImagePath()) !== null) {
            $blog->images()->create([
                'image' => $legacyPath,
                'sort_order' => $nextSortOrder++,
            ]);
        }

        foreach ($files as $index => $file) {
            $path = $file->store('blogs', 'public');

            $blog->images()->create([
                'image' => $path,
                'sort_order' => $nextSortOrder + $index,
            ]);

            if ($blog->image === null) {
                $blog->update(['image' => $path]);
            }
        }
    }
}
