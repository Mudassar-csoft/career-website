<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Course;
use App\Models\Event;
use App\Models\News;

class HomeController extends Controller
{
    public function index()
    {
        $featuredCourses = Course::with(['category', 'mode'])->where('is_featured', true)->latest()->take(6)->get();
        $eventsWidget = Event::where('event_date', '>=', now()->toDateString())
            ->orderBy('event_date')
            ->take(3)
            ->get();

        if ($eventsWidget->count() < 3) {
            $eventsWidget = $eventsWidget->concat(
                Event::where('event_date', '<', now()->toDateString())
                    ->orderByDesc('event_date')
                    ->take(3 - $eventsWidget->count())
                    ->get()
            )->values();
        }

        if ($featuredCourses->isEmpty()) {
            $featuredCourses = Course::with(['category', 'mode'])->latest()->take(6)->get();
        }

        return view('pages.home', [
            'blogs' => Blog::latest()->take(4)->get(),
            'newsWidget' => News::with('type')->latest()->take(4)->get(),
            'eventsWidget' => $eventsWidget,
            'featuredCourses' => $featuredCourses,
        ]);
    }
}
