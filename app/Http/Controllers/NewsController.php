<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Concerns\BuildsDashboardMenu;
use App\Models\News;
use App\Models\NewsType;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    use BuildsDashboardMenu;

    public function index()
    {
        return view('dashboard.news.index', [
            'screens' => $this->screens(),
            'active' => 'news',
            'newsItems' => News::with('type')->latest()->get(),
        ]);
    }

    public function create()
    {
        return view('dashboard.news.create', [
            'screens' => $this->screens(),
            'active' => 'news',
            'newsTypes' => NewsType::orderBy('name')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'subtitle' => ['nullable', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:news,slug', 'alpha_dash'],
            'news_type_id' => ['required', 'exists:news_types,id'],
            'image' => ['nullable', 'image', 'max:4096'],
            'content' => ['nullable', 'string'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:500'],
            'meta_keywords' => ['nullable', 'string', 'max:255'],
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('news', 'public');
        }

        News::create($validated);

        return redirect()->route('dashboard.news.index')->with('status', 'News article published.');
    }

    public function destroy(News $news)
    {
        $news->delete();

        return redirect()->route('dashboard.news.index')->with('status', 'News article deleted.');
    }

    public function storeType(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:news_types,name'],
        ]);

        $type = NewsType::create([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
        ]);

        return response()->json($type);
    }
}
