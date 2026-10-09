@extends('dashboard.layout')
@section('title', 'Job Applications | Dashboard')

@section('content')
    <div class="dash-page">
        <div class="dash-page-header"><h2>Applications &amp; CVs</h2></div>

        <form method="GET" action="{{ route('dashboard.job-applications.index') }}" class="dash-form-row">
            <div class="dash-form-group">
                <label for="application-search">Search applicants or jobs</label>
                <input id="application-search" type="search" name="search" value="{{ $search }}" placeholder="Name, email, contact or job title">
            </div>
            <div class="dash-form-group">
                <label for="application-job">Job</label>
                <select id="application-job" name="job_offer_id">
                    <option value="">All applications</option>
                    @foreach ($jobs as $job)
                        <option value="{{ $job->id }}" @selected((string) $jobOfferId === (string) $job->id)>{{ $job->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="dash-form-group" style="display:flex;align-items:flex-end;gap:8px;">
                <button type="submit" class="dash-btn">Filter</button>
                <a href="{{ route('dashboard.job-applications.index') }}" class="dash-btn dash-btn-secondary">Reset</a>
            </div>
        </form>

        <p>{{ $applications->total() }} {{ Str::plural('application', $applications->total()) }}</p>
        <div class="dash-table-box">
            @if ($applications->isEmpty())
                <div class="dash-empty">No applications found.</div>
            @else
                <div class="dash-table-scroll">
                    <table class="dash-table">
                        <thead><tr><th>Submitted</th><th>Job</th><th>Applicant</th><th>Contact</th><th>City</th><th>Qualification</th><th>Actions</th></tr></thead>
                        <tbody>
                            @foreach ($applications as $application)
                                <tr>
                                    <td>{{ $application->created_at->format('d M, Y g:i A') }}</td>
                                    <td>{{ $application->job_title ?: 'General CV submission' }}</td>
                                    <td><strong>{{ $application->name ?: 'Not provided' }}</strong><br>{{ $application->email ?: 'No email' }}</td>
                                    <td>{{ $application->phone ?: 'Not provided' }}</td>
                                    <td>{{ $application->city ?: 'Not provided' }}</td>
                                    <td>{{ $application->qualification ?: 'Not provided' }}</td>
                                    <td>
                                        <div style="display:flex;gap:8px;flex-wrap:wrap;">
                                            <a class="dash-btn dash-btn-secondary" href="{{ route('dashboard.job-applications.show', $application) }}">Details</a>
                                            <a class="dash-btn dash-btn-secondary" href="{{ route('dashboard.job-applications.cv', $application) }}" target="_blank" rel="noopener">View CV</a>
                                            <a class="dash-btn" href="{{ route('dashboard.job-applications.download', $application) }}">Download CV</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>

        @if ($applications->hasPages())
            <nav aria-label="Application pages" style="display:flex;gap:12px;align-items:center;margin-top:20px;">
                @if ($applications->previousPageUrl())
                    <a class="dash-btn dash-btn-secondary" href="{{ $applications->previousPageUrl() }}">Previous</a>
                @endif
                <span>Page {{ $applications->currentPage() }} of {{ $applications->lastPage() }}</span>
                @if ($applications->nextPageUrl())
                    <a class="dash-btn dash-btn-secondary" href="{{ $applications->nextPageUrl() }}">Next</a>
                @endif
            </nav>
        @endif
    </div>
@endsection
