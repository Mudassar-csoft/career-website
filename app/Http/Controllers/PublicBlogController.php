<?php

namespace App\Http\Controllers;

use App\Models\Blog;

class PublicBlogController extends Controller
{
    public function index()
    {
        return view('pages.blogs', [
            'blogs' => Blog::latest()->get(),
        ]);
    }

    public function show(Blog $blog)
    {
        return view('pages.blog-detail', [
            'blog' => $blog,
            'relatedBlogs' => Blog::where('id', '!=', $blog->id)->latest()->take(4)->get(),
        ]);
    }
}
