<?php

namespace App\Http\Controllers;

use App\Models\EventImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EventMediaController extends Controller
{
    public function show(EventImage $image)
    {
        $path = str_replace('\\', '/', trim((string) $image->image));
        $path = ltrim($path, '/');

        foreach (['storage/app/public/', 'app/public/', 'public/', 'storage/'] as $prefix) {
            if (Str::startsWith($path, $prefix)) {
                $path = Str::after($path, $prefix);
                break;
            }
        }

        $path = ltrim($path, '/');

        if ($path === '' || str_contains($path, '..') || ! Storage::disk('public')->exists($path)) {
            abort(404);
        }

        return response()->file(Storage::disk('public')->path($path), [
            'Cache-Control' => 'public, max-age=86400',
        ]);
    }
}
