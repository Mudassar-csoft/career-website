<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\NewsType;

class PublicNewsController extends Controller
{
    public function index()
    {
        $selectedNewsType = NewsType::query()
            ->where('slug', request('type'))
            ->first();

        $newsItems = News::query()
            ->with('type')
            ->when($selectedNewsType, fn ($query) => $query->where('news_type_id', $selectedNewsType->id))
            ->orderByDesc('published_at')
            ->latest()
            ->paginate(7)
            ->withQueryString();

        $pageItems = $newsItems->getCollection();

        return view('pages.news', [
            'newsItems' => $newsItems,
            'featuredNews' => $pageItems->first(),
            'otherNews' => $pageItems->skip(1)->values(),
            'recentPosts' => News::with('type')->orderByDesc('published_at')->latest()->take(5)->get(),
            'newsTypes' => NewsType::withCount('news')->orderBy('name')->get(),
            'selectedNewsType' => $selectedNewsType,
        ]);
    }

    public function show(News $news)
    {
        return view('pages.news-detail', [
            'news' => $news->load('type'),
            'relatedNews' => News::where('id', '!=', $news->id)->orderByDesc('published_at')->latest()->take(5)->get(),
            'newsTypes' => NewsType::withCount('news')->orderBy('name')->get(),
        ]);
    }
}
