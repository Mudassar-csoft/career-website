<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class PublicBlogController extends Controller
{
    public function index(Request $request)
    {
        $search = trim((string) $request->input('search', ''));

        $blogsQuery = Blog::query()
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($nested) use ($search) {
                    $nested->where('title', 'like', "%{$search}%")
                        ->orWhere('excerpt', 'like', "%{$search}%")
                        ->orWhere('content', 'like', "%{$search}%");
                });
            });

        return view('pages.blogs', [
            'search' => $search,
            'blogs' => (clone $blogsQuery)->latest()->paginate(6)->withQueryString(),
            'popularBlogs' => Blog::latest()->take(5)->get(),
        ]);
    }

    public function show(Blog $blog)
    {
        $blog->load('images');

        return view('pages.blog-detail', [
            'blog' => $blog,
            'relatedBlogs' => Blog::where('id', '!=', $blog->id)->latest()->take(4)->get(),
        ]);
    }
}
