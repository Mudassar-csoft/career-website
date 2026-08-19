<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\CourseMode;
use Illuminate\Http\Request;

class PublicCourseController extends Controller
{
    public function index(Request $request)
    {
        $search = trim((string) $request->input('search', ''));
        $selectedCategories = collect((array) $request->input('categories', []))
            ->filter()
            ->map(fn ($slug) => (string) $slug)
            ->unique()
            ->values()
            ->all();
        $selectedModes = collect((array) $request->input('modes', []))
            ->filter()
            ->map(fn ($slug) => (string) $slug)
            ->unique()
            ->values()
            ->all();
        $selectedDurations = collect((array) $request->input('durations', []))
            ->filter()
            ->map(fn ($range) => (string) $range)
            ->unique()
            ->values()
            ->all();

        $coursesQuery = Course::query()
            ->with(['category', 'mode'])
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($nested) use ($search) {
                    $nested->where('title', 'like', "%{$search}%")
                        ->orWhere('subtitle', 'like', "%{$search}%")
                        ->orWhere('about', 'like', "%{$search}%")
                        ->orWhereHas('category', fn ($categoryQuery) => $categoryQuery->where('name', 'like', "%{$search}%"))
                        ->orWhereHas('mode', fn ($modeQuery) => $modeQuery->where('name', 'like', "%{$search}%"));
                });
            })
            ->when(! empty($selectedCategories), function ($query) use ($selectedCategories) {
                $query->whereHas('category', fn ($categoryQuery) => $categoryQuery->whereIn('slug', $selectedCategories));
            })
            ->when(! empty($selectedModes), function ($query) use ($selectedModes) {
                $query->whereHas('mode', fn ($modeQuery) => $modeQuery->whereIn('slug', $selectedModes));
            })
            ->when(! empty($selectedDurations), function ($query) use ($selectedDurations) {
                $query->where(function ($durationQuery) use ($selectedDurations) {
                    foreach ($selectedDurations as $range) {
                        match ($range) {
                            '1-12' => $durationQuery->orWhereBetween('duration_weeks', [1, 12]),
                            '13-24' => $durationQuery->orWhereBetween('duration_weeks', [13, 24]),
                            '25-52' => $durationQuery->orWhereBetween('duration_weeks', [25, 52]),
                            'flexible' => $durationQuery->orWhereNull('duration_weeks'),
                            default => null,
                        };
                    }
                });
            });

        $featuredCourses = (clone $coursesQuery)
            ->where('is_featured', true)
            ->latest()
            ->take(6)
            ->get();

        if ($featuredCourses->isEmpty()) {
            $featuredCourses = (clone $coursesQuery)
                ->latest()
                ->take(6)
                ->get();
        }

        return view('pages.courses-certifications', [
            'search' => $search,
            'selectedCategories' => $selectedCategories,
            'selectedModes' => $selectedModes,
            'selectedDurations' => $selectedDurations,
            'courses' => (clone $coursesQuery)->latest()->paginate(9)->withQueryString(),
            'featuredCourses' => $featuredCourses,
            'categories' => CourseCategory::sortFixed(
                CourseCategory::query()
                    ->whereIn('slug', CourseCategory::fixedSlugs())
                    ->withCount('courses')
                    ->with(['courses' => fn ($query) => $query->select('id', 'course_category_id', 'title')->latest()])
                    ->get()
            ),
            'modes' => CourseMode::query()
                ->withCount('courses')
                ->whereHas('courses')
                ->orderBy('name')
                ->get(),
        ]);
    }

    public function show(Course $course)
    {
        return view('pages.course-detail', [
            'course' => $course->load(['category', 'mode']),
        ]);
    }
}
