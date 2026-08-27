<!doctype html>
<html lang="en">
<body style="font-family:Arial,sans-serif;color:#1d2b36;">
    <h2>New Partnership Inquiry</h2>
    <p><strong>Name:</strong> {{ $inquiry->name }}</p>
    <p><strong>Email:</strong> {{ $inquiry->email }}</p>
    <p><strong>Phone:</strong> {{ $inquiry->phone }}</p>
    <p><strong>Business interest:</strong> {{ $inquiry->business_interest }}</p>
    <p><strong>Partnership opportunity:</strong><br>{{ $inquiry->partnership_opportunity }}</p>
</body>
</html>
