<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\SuccessStory;

class PublicSuccessStoryController extends Controller
{
    public function index()
    {
        return view('pages.stories', [
            'successStories' => SuccessStory::latest()->get(),
            'alumni' => Alumni::latest()->get(),
        ]);
    }
}
