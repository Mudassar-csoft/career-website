<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseCategory;

class PublicCourseController extends Controller
{
    public function index()
    {
        $courses = Course::with(['category', 'mode'])->latest()->get();

        $featuredCourses = $courses->where('is_featured', true)->take(6);

        if ($featuredCourses->isEmpty()) {
            $featuredCourses = $courses->take(6);
        }

        return view('pages.courses-certifications', [
            'courses' => $courses,
            'featuredCourses' => $featuredCourses,
            'categories' => CourseCategory::orderBy('name')->get(),
        ]);
    }

    public function show(Course $course)
    {
        return view('pages.course-detail', [
            'course' => $course->load(['category', 'mode']),
        ]);
    }
}
