<?php

namespace App\Http\Controllers;

use App\Models\SuccessStory;
use Illuminate\Support\Facades\Storage;

class SuccessStoryMediaController extends Controller
{
    public function show(SuccessStory $successStory)
    {
        $path = $successStory->resolveImagePath();

        if ($path === null) {
            abort(404);
        }

        return Storage::disk('public')->response($path, null, [
            'Cache-Control' => 'public, max-age=86400',
        ]);
    }
}
