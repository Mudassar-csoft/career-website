<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Concerns\BuildsDashboardMenu;
use App\Models\GalleryCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class GalleryCategoryController extends Controller
{
    use BuildsDashboardMenu;

    public function index()
    {
        return view('dashboard.gallery.index', [
            'screens' => $this->screens(),
            'active' => 'gallery',
            'categories' => GalleryCategory::withCount('images')
                ->orderBy('sort_order')
                ->orderBy('name')
                ->get(),
        ]);
    }

    public function create()
    {
        return view('dashboard.gallery.create', [
            'screens' => $this->screens(),
            'active' => 'gallery',
            'category' => new GalleryCategory,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $this->validateCategory($request);
        $validated['slug'] = $this->makeUniqueSlug($validated['name']);
        $validated['is_active'] = (bool) $validated['is_active'];

        GalleryCategory::create($validated);

        return redirect()->route('dashboard.gallery.index')->with('status', 'Gallery category created.');
    }

    public function edit(GalleryCategory $galleryCategory)
    {
        return view('dashboard.gallery.edit', [
            'screens' => $this->screens(),
            'active' => 'gallery',
            'category' => $galleryCategory,
        ]);
    }

    public function update(Request $request, GalleryCategory $galleryCategory)
    {
        $validated = $this->validateCategory($request, $galleryCategory);
        $validated['slug'] = $this->makeUniqueSlug($validated['name'], $galleryCategory);
        $validated['is_active'] = (bool) $validated['is_active'];

        $galleryCategory->update($validated);

        return redirect()->route('dashboard.gallery.index')->with('status', 'Gallery category updated.');
    }

    public function destroy(GalleryCategory $galleryCategory)
    {
        $paths = $galleryCategory->images()->pluck('image')->filter()->all();

        if (! empty($paths)) {
            Storage::disk('public')->delete($paths);
        }

        $galleryCategory->delete();

        return redirect()->route('dashboard.gallery.index')->with('status', 'Gallery category deleted.');
    }

    protected function validateCategory(Request $request, ?GalleryCategory $galleryCategory = null): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique('gallery_categories', 'name')->ignore($galleryCategory?->id)],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['required', 'in:0,1'],
        ]) + [
            'sort_order' => (int) $request->input('sort_order', 0),
        ];
    }

    protected function makeUniqueSlug(string $name, ?GalleryCategory $galleryCategory = null): string
    {
        $baseSlug = Str::slug($name);
        $baseSlug = filled($baseSlug) ? $baseSlug : 'gallery-category';
        $slug = $baseSlug;
        $counter = 2;

        while (
            GalleryCategory::query()
                ->when($galleryCategory, fn ($query) => $query->whereKeyNot($galleryCategory->id))
                ->where('slug', $slug)
                ->exists()
        ) {
            $slug = $baseSlug.'-'.$counter;
            $counter++;
        }

        return $slug;
    }
}
