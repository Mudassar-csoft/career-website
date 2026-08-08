<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\NewsType;

class PublicNewsController extends Controller
{
    public function index()
    {
        $newsItems = News::with('type')->latest()->get();

        return view('pages.news', [
            'newsItems' => $newsItems,
            'featuredNews' => $newsItems->first(),
            'otherNews' => $newsItems->skip(1)->take(6),
            'recentPosts' => $newsItems->take(5),
            'newsTypes' => NewsType::withCount('news')->orderBy('name')->get(),
        ]);
    }

    public function show(News $news)
    {
        return view('pages.news-detail', [
            'news' => $news->load('type'),
            'relatedNews' => News::where('id', '!=', $news->id)->latest()->take(5)->get(),
            'newsTypes' => NewsType::withCount('news')->orderBy('name')->get(),
        ]);
    }
}
