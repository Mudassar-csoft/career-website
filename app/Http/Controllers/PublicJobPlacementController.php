<?php

namespace App\Http\Controllers;

use App\Models\JobOffer;
use Illuminate\Http\Request;

class PublicJobPlacementController extends Controller
{
    public function index(Request $request)
    {
        $search = trim((string) $request->input('search'));
        $jobType = trim((string) $request->input('job_type'));
        $location = trim((string) $request->input('location'));

        $jobOffers = JobOffer::query()
            ->when($search !== '', fn ($query) => $query->where('title', 'like', "%{$search}%"))
            ->when($jobType !== '', fn ($query) => $query->where('job_type', 'like', "%{$jobType}%"))
            ->when($location !== '', fn ($query) => $query->where('location', 'like', "%{$location}%"))
            ->orderBy('deadline')
            ->get();

        return view('pages.job-placement', compact('jobOffers', 'search', 'jobType', 'location'));
    }
}
