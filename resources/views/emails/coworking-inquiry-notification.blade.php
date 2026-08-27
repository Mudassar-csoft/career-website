<!doctype html>
<html lang="en">
<body style="font-family:Arial,sans-serif;color:#1d2b36;">
    <h2>New Coworking Inquiry</h2>
    <p><strong>Name:</strong> {{ $inquiry->name }}</p>
    <p><strong>Email:</strong> {{ $inquiry->email }}</p>
    <p><strong>Phone:</strong> {{ $inquiry->phone }}</p>
    <p><strong>City:</strong> {{ $inquiry->city }}</p>
    <p><strong>Interested in:</strong> {{ $inquiry->interested_in }}</p>
    <p><strong>Number of persons:</strong> {{ $inquiry->number_of_persons }}</p>
</body>
</html>
