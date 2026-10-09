<!doctype html>
<html lang="en">
<body style="font-family:Arial,sans-serif;color:#1d2b36;">
    <h2>New Job Application</h2>
    <p><strong>Job:</strong> {{ $application->job_title ?: 'General CV submission' }}</p>
    <p><strong>Name:</strong> {{ $application->name }}</p>
    <p><strong>Email:</strong> {{ $application->email }}</p>
    <p><strong>Contact:</strong> {{ $application->phone }}</p>
    <p><strong>City:</strong> {{ $application->city ?: 'Not provided' }}</p>
    <p><strong>LinkedIn:</strong> {{ $application->linkedin_url ?: 'Not provided' }}</p>
    <p><strong>College/University:</strong> {{ $application->institution ?: 'Not provided' }}</p>
    <p><strong>Qualification:</strong> {{ $application->qualification ?: 'Not provided' }}</p>
    <p>The applicant's CV is attached.</p>
    <p><a href="{{ route('dashboard.job-applications.show', $application) }}">Review this application in the dashboard</a></p>
</body>
</html>
