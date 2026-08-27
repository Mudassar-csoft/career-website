<!doctype html>
<html lang="en">
<body style="font-family:Arial,sans-serif;color:#1d2b36;">
    <h2>New Exam Scheduling Request</h2>
    <p><strong>Provider:</strong> {{ $inquiry->exam_provider }}</p>
    <p><strong>Exam title:</strong> {{ $inquiry->exam_title }}</p>
    <p><strong>Exam code:</strong> {{ $inquiry->exam_code ?: 'Not provided' }}</p>
    <p><strong>Name:</strong> {{ $inquiry->name }}</p>
    <p><strong>Email:</strong> {{ $inquiry->email }}</p>
    <p><strong>City:</strong> {{ $inquiry->city }}</p>
    <p><strong>Preferred date:</strong> {{ $inquiry->preferred_date->format('d M, Y') }}</p>
    <p><strong>Message:</strong><br>{{ $inquiry->message ?: 'Not provided' }}</p>
</body>
</html>
