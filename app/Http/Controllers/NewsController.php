<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Concerns\BuildsDashboardMenu;
use App\Models\News;
use App\Models\NewsType;
use App\Support\DashboardImageUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class NewsController extends Controller
{
    use BuildsDashboardMenu;

    public function index()
    {
        return view('dashboard.news.index', [
            'screens' => $this->screens(),
            'active' => 'news',
            'newsItems' => News::with('type')->orderByDesc('published_at')->latest()->get(),
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
            $validated['image'] = $this->storeImage($request);
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
        $previousImage = $news->image;
        $hasNewImage = $request->hasFile('image');

        if ($hasNewImage) {
            $validated['image'] = $this->storeImage($request);
        }

        $news->update($validated);

        if (isset($validated['image']) && $previousImage && $previousImage !== $validated['image']) {
            $this->deleteImage($previousImage);
        }

        return redirect()->route('dashboard.news.index')->with(
            'status',
            $hasNewImage ? 'News article and image updated.' : 'News article updated. No new image file was received.'
        );
    }

    protected function validateNews(Request $request, ?News $news = null): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'min:50', 'max:55'],
            'subtitle' => ['nullable', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:news,slug,'.($news->id ?? 'NULL').',id', 'alpha_dash'],
            'news_type_id' => ['required', 'exists:news_types,id'],
            'published_at' => ['required', 'date'],
            'image' => DashboardImageUpload::rules(),
            'content' => ['nullable', 'string'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:500'],
            'meta_keywords' => ['nullable', 'string', 'max:255'],
        ]);
    }

    protected function storeImage(Request $request): string
    {
        $file = $request->file('image');
        $directory = public_path('uploads/news');
        $filename = Str::uuid().'.'.$file->extension();

        File::ensureDirectoryExists($directory);
        $file->move($directory, $filename);

        $path = 'uploads/news/'.$filename;

        if (! is_file(public_path($path))) {
            throw ValidationException::withMessages([
                'image' => 'The image could not be saved. Verify write access to public/uploads/news and try again.',
            ]);
        }

        return $path;
    }

    protected function deleteImage(string $path): void
    {
        if (filter_var($path, FILTER_VALIDATE_URL)) {
            return;
        }

        $publicPath = ltrim($path, '/');
        $storagePath = preg_replace('#^/?storage/#', '', $publicPath);

        if (Storage::disk('public')->exists($storagePath)) {
            Storage::disk('public')->delete($storagePath);

            return;
        }

        if (is_file(public_path($publicPath))) {
            File::delete(public_path($publicPath));
        }
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
