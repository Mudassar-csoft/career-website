<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Concerns\BuildsDashboardMenu;
use App\Models\JobApplication;
use App\Models\JobOffer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JobApplicationController extends Controller
{
    use BuildsDashboardMenu;

    public function index(Request $request)
    {
        $validated = $request->validate([
            'search' => ['nullable', 'string', 'max:255'],
            'job_offer_id' => ['nullable', 'integer', 'exists:job_offers,id'],
        ]);
        $search = trim($validated['search'] ?? '');
        $jobOfferId = $validated['job_offer_id'] ?? null;

        $applications = JobApplication::query()
            ->when($jobOfferId, fn ($query) => $query->where('job_offer_id', $jobOfferId))
            ->when($search !== '', fn ($query) => $query->where(function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%")
                    ->orWhere('job_title', 'like', "%{$search}%");
            }))
            ->latest()
            ->orderByDesc('id')
            ->paginate(20)
            ->withQueryString();

        return view('dashboard.job-applications.index', [
            'screens' => $this->screens(),
            'active' => 'job-offers',
            'applications' => $applications,
            'jobs' => JobOffer::orderBy('title')->get(),
            'search' => $search,
            'jobOfferId' => $jobOfferId,
        ]);
    }

    public function show(JobApplication $jobApplication)
    {
        return view('dashboard.job-applications.show', [
            'screens' => $this->screens(),
            'active' => 'job-offers',
            'application' => $jobApplication,
        ]);
    }

    public function viewCv(JobApplication $jobApplication)
    {
        return $this->cvResponse($jobApplication, 'inline');
    }

    public function downloadCv(JobApplication $jobApplication)
    {
        return $this->cvResponse($jobApplication, 'attachment');
    }

    private function cvResponse(JobApplication $application, string $disposition)
    {
        $disk = Storage::disk('local');
        abort_unless($disk->exists($application->document_path), 404, 'This CV is no longer available.');

        return $disk->response($application->document_path, $application->document_name, [
            'Cache-Control' => 'private, no-store',
            'X-Content-Type-Options' => 'nosniff',
        ], $disposition);
    }
}
