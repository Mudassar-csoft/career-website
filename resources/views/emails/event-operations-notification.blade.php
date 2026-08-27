<!doctype html>
<html lang="en">
<body style="font-family:Arial,sans-serif;color:#1d2b36;">
    <h2>{{ $notificationType === 'payment receipt' ? 'Payment Receipt Submitted' : 'New Event Registration' }}</h2>
    <p><strong>Event:</strong> {{ $event->title }}</p>
    <p><strong>Date:</strong> {{ $event->event_date->format('d M, Y') }}</p>
    <p><strong>Registrant:</strong> {{ $registration->name }}</p>
    <p><strong>Email:</strong> {{ $registration->email }}</p>
    <p><strong>Phone:</strong> {{ $registration->phone ?: 'Not provided' }}</p>
    <p><strong>Registration status:</strong> {{ ucfirst($registration->status) }}</p>
    @if ($notificationType === 'payment receipt')
        <p>A payment receipt is ready for review in the event registrations dashboard.</p>
    @endif
</body>
</html>
