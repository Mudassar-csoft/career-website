<?php

namespace App\Http\Controllers;

use App\Models\BlogImage;
use Illuminate\Support\Facades\Storage;

class BlogImageMediaController extends Controller
{
    public function show(BlogImage $image)
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
