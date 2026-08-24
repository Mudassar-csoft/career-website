<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Concerns\BuildsDashboardMenu;
use App\Models\News;
use App\Models\NewsType;
use App\Support\DashboardImageUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
            'news' => new News,
            'newsTypes' => NewsType::orderBy('name')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $this->validateNews($request);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('news', 'public');
        }

        News::create($validated);

        return redirect()->route('dashboard.news.index')->with('status', 'News article published.');
    }

    public function edit(News $news)
    {
        return view('dashboard.news.create', [
            'screens' => $this->screens(),
            'active' => 'news',
            'news' => $news,
            'newsTypes' => NewsType::orderBy('name')->get(),
        ]);
    }

    public function update(Request $request, News $news)
    {
        $validated = $this->validateNews($request, $news);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('news', 'public');

            if ($news->image) {
                Storage::disk('public')->delete($news->image);
            }
        }

        $news->update($validated);

        return redirect()->route('dashboard.news.index')->with('status', 'News article updated.');
    }

    protected function validateNews(Request $request, ?News $news = null): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'min:50', 'max:55'],
            'subtitle' => ['nullable', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:news,slug,'.($news->id ?? 'NULL').',id', 'alpha_dash'],
            'news_type_id' => ['required', 'exists:news_types,id'],
            'image' => DashboardImageUpload::rules(),
            'content' => ['nullable', 'string'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:500'],
            'meta_keywords' => ['nullable', 'string', 'max:255'],
        ]);
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
