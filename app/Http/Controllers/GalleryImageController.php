<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Concerns\BuildsDashboardMenu;
use App\Models\GalleryCategory;
use App\Models\GalleryImage;
use App\Support\DashboardImageUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryImageController extends Controller
{
    use BuildsDashboardMenu;

    public function index(GalleryCategory $galleryCategory)
    {
        return view('dashboard.gallery.images', [
            'screens' => $this->screens(),
            'active' => 'gallery',
            'category' => $galleryCategory,
            'images' => $galleryCategory->images()->orderBy('sort_order')->orderBy('id')->get(),
        ]);
    }

    public function store(Request $request, GalleryCategory $galleryCategory)
    {
        $validated = $request->validate([
            'images' => ['required', 'array', 'min:1'],
            'images.*' => DashboardImageUpload::rulesWithDimensions(1080, 1350),
        ]);

        $nextSortOrder = ((int) $galleryCategory->images()->max('sort_order')) + 1;

        foreach ($validated['images'] as $index => $file) {
            $galleryCategory->images()->create([
                'image' => $file->store('site-gallery', 'public'),
                'sort_order' => $nextSortOrder + $index,
                'is_active' => true,
            ]);
        }

        return back()->with('status', 'Gallery photos uploaded.');
    }

    public function destroy(GalleryCategory $galleryCategory, GalleryImage $galleryImage)
    {
        if ($galleryImage->gallery_category_id !== $galleryCategory->id) {
            abort(404);
        }

        Storage::disk('public')->delete($galleryImage->image);
        $galleryImage->delete();

        return back()->with('status', 'Gallery photo removed.');
    }
}
