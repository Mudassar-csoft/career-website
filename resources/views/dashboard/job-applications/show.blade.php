@extends('dashboard.layout')
@section('title', 'Application Details | Dashboard')

@section('topbar-actions')
    <a href="{{ route('dashboard.job-applications.index') }}" class="dash-btn dash-btn-secondary">All Applications</a>
@endsection

@section('content')
    <div class="dash-page">
        <div class="dash-page-header"><h2>{{ $application->job_title ?: 'General CV submission' }}</h2></div>
        <div class="dash-table-box">
            <table class="dash-table">
                <tbody>
                    <tr><th>Applicant</th><td>{{ $application->name ?: 'Not provided' }}</td></tr>
                    <tr><th>Submitted</th><td>{{ $application->created_at->format('d M, Y g:i A') }}</td></tr>
                    <tr><th>Email</th><td>{{ $application->email ?: 'Not provided' }}</td></tr>
                    <tr><th>Contact</th><td>{{ $application->phone ?: 'Not provided' }}</td></tr>
                    <tr><th>City</th><td>{{ $application->city ?: 'Not provided' }}</td></tr>
                    <tr><th>College/University</th><td>{{ $application->institution ?: 'Not provided' }}</td></tr>
                    <tr><th>Qualification</th><td>{{ $application->qualification ?: 'Not provided' }}</td></tr>
                    <tr><th>LinkedIn</th><td style="white-space:normal;overflow-wrap:anywhere;">{{ $application->linkedin_url ?: 'Not provided' }}</td></tr>
                    <tr><th>CV</th><td style="white-space:normal;overflow-wrap:anywhere;">{{ $application->document_name }}</td></tr>
                </tbody>
            </table>
        </div>
        <div style="display:flex;gap:12px;flex-wrap:wrap;margin-top:20px;">
            <a href="{{ route('dashboard.job-applications.cv', $application) }}" class="dash-btn dash-btn-secondary" target="_blank" rel="noopener">View CV</a>
            <a href="{{ route('dashboard.job-applications.download', $application) }}" class="dash-btn">Download CV</a>
        </div>
        <p>PDF CVs open in your browser. Download Word documents to open them in a document viewer.</p>
    </div>
@endsection
