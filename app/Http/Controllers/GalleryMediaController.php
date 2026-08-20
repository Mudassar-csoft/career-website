<?php

namespace App\Http\Controllers;

use App\Models\GalleryImage;
use Illuminate\Support\Facades\Storage;

class GalleryMediaController extends Controller
{
    public function show(GalleryImage $image)
    {
        $path = $image->resolveImagePath();

        if ($path === null) {
            abort(404);
        }

        return Storage::disk('public')->response($path, null, [
            'Cache-Control' => 'public, max-age=86400',
        ]);
    }
}
