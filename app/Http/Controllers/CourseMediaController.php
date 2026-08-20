<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Support\Facades\Storage;

class CourseMediaController extends Controller
{
    public function show(Course $course)
    {
        $path = $course->resolveImagePath();

        if ($path === null) {
            abort(404);
        }

        return response()->file(Storage::disk('public')->path($path), [
            'Cache-Control' => 'public, max-age=86400',
        ]);
    }
}
