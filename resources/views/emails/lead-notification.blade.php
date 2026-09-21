<!doctype html>
<html lang="en">
<body style="font-family:Arial,sans-serif;color:#1d2b36;">
    <h2>New Website Enquiry</h2>
    <p><strong>Source:</strong> {{ $subscriber->source ?: 'General enquiry' }}</p>
    <p><strong>Name:</strong> {{ $subscriber->name ?: 'Not provided' }}</p>
    <p><strong>Email:</strong> {{ $subscriber->email ?: 'Not provided' }}</p>
    <p><strong>Phone:</strong> {{ $subscriber->phone ?: 'Not provided' }}</p>
    @foreach (['city' => 'City', 'linkedin_url' => 'LinkedIn Profile', 'institution' => 'College/University', 'qualification' => 'Qualification', 'message' => 'Additional Information'] as $field => $label)
        @if (filled($details[$field] ?? null))
            <p><strong>{{ $label }}:</strong> {{ $details[$field] }}</p>
        @endif
    @endforeach
</body>
</html>
