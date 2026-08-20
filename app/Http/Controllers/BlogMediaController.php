<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Support\Facades\Storage;

class BlogMediaController extends Controller
{
    public function show(Blog $blog)
    {
        $path = $blog->resolveImagePath();

        if ($path === null) {
            abort(404);
        }

        return Storage::disk('public')->response($path, null, [
            'Cache-Control' => 'public, max-age=86400',
        ]);
    }
}
