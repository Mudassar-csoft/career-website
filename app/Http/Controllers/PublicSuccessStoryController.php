<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\Faq;
use App\Models\SuccessStory;

class PublicSuccessStoryController extends Controller
{
    public function index()
    {
        return view('pages.stories', [
            'successStories' => SuccessStory::latest()->get(),
            'alumni' => Alumni::latest()->get(),
            'storyFaqItems' => Faq::query()
                ->where('is_active', true)
                ->whereHas('category', fn ($query) => $query->where('is_active', true))
                ->orderBy('sort_order')
                ->orderBy('id')
                ->take(3)
                ->get(),
        ]);
    }
}
