<?php

namespace App\Http\Controllers;

use App\Models\Blog;

class PublicBlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->get();

        return view('pages.blogs', [
            'blogs' => $blogs,
            'popularBlogs' => $blogs->take(5),
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
