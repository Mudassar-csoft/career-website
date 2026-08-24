<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Concerns\BuildsDashboardMenu;
use App\Models\JobOffer;
use Illuminate\Http\Request;

class JobOfferController extends Controller
{
    use BuildsDashboardMenu;

    public function index()
    {
        return view('dashboard.job-offers.index', [
            'screens' => $this->screens(),
            'active' => 'job-offers',
            'jobOffers' => JobOffer::orderBy('deadline')->get(),
        ]);
    }

    public function create()
    {
        return view('dashboard.job-offers.create', [
            'screens' => $this->screens(),
            'active' => 'job-offers',
            'jobOffer' => new JobOffer,
        ]);
    }

    public function store(Request $request)
    {
        JobOffer::create($this->validateOffer($request));

        return redirect()->route('dashboard.job-offers.index')->with('status', 'Job offer added.');
    }

    public function edit(JobOffer $jobOffer)
    {
        return view('dashboard.job-offers.edit', [
            'screens' => $this->screens(),
            'active' => 'job-offers',
            'jobOffer' => $jobOffer,
        ]);
    }

    public function update(Request $request, JobOffer $jobOffer)
    {
        $jobOffer->update($this->validateOffer($request));

        return redirect()->route('dashboard.job-offers.index')->with('status', 'Job offer updated.');
    }

    public function destroy(JobOffer $jobOffer)
    {
        $jobOffer->delete();

        return redirect()->route('dashboard.job-offers.index')->with('status', 'Job offer deleted.');
    }

    private function validateOffer(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'job_type' => ['required', 'string', 'max:100'],
            'location' => ['required', 'string', 'max:255'],
            'deadline' => ['required', 'date'],
            'application_url' => ['nullable', 'url', 'max:2048'],
        ]);
    }
}
