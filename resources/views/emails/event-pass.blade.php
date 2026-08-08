<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Your Pass for {{ $event->title }}</title>
</head>
<body style="font-family: Arial, sans-serif; color: #1d2b36; background: #f4f7f9; padding: 24px;">
    <div style="max-width: 560px; margin: 0 auto; background: #fff; border-radius: 12px; overflow: hidden;">
        <div style="background: linear-gradient(90deg, #009DB8 0%, #03C587 100%); padding: 20px 28px;">
            <img src="{{ asset('assets/images/logo.svg') }}" alt="Career Institute" style="height: 32px;">
        </div>
        <div style="padding: 28px;">
            <h2 style="margin: 0 0 4px;">You're confirmed, {{ $registration->name }}!</h2>
            <p style="color: #7c8a94; margin: 0 0 20px;">This email is your pass — please keep it handy and show it at check-in.</p>

            <div style="border: 2px dashed #03C587; border-radius: 10px; padding: 18px 20px; margin-bottom: 20px;">
                <p style="margin: 0 0 10px; font-size: 12px; letter-spacing: .05em; text-transform: uppercase; color: #03917a; font-weight: 700;">Event Pass</p>
                <h3 style="margin: 0 0 12px; font-size: 18px;">{{ $event->title }}</h3>
                <table style="width: 100%; font-size: 14px; color: #1d2b36;">
                    <tr>
                        <td style="padding: 4px 0; color: #7c8a94;">Date</td>
                        <td style="padding: 4px 0; text-align: right; font-weight: 600;">{{ $event->event_date->format('d M, Y') }}</td>
                    </tr>
                    <tr>
                        <td style="padding: 4px 0; color: #7c8a94;">Campus</td>
                        <td style="padding: 4px 0; text-align: right; font-weight: 600;">{{ $event->campus }}</td>
                    </tr>
                    <tr>
                        <td style="padding: 4px 0; color: #7c8a94;">Venue</td>
                        <td style="padding: 4px 0; text-align: right; font-weight: 600;">{{ $event->venue }}</td>
                    </tr>
                    <tr>
                        <td style="padding: 4px 0; color: #7c8a94;">Organizer</td>
                        <td style="padding: 4px 0; text-align: right; font-weight: 600;">{{ $event->organizer }}</td>
                    </tr>
                    <tr>
                        <td style="padding: 4px 0; color: #7c8a94;">Pass Code</td>
                        <td style="padding: 4px 0; text-align: right; font-weight: 600;">EVT-{{ str_pad($registration->id, 6, '0', STR_PAD_LEFT) }}</td>
                    </tr>
                </table>
            </div>

            <p style="margin: 0 0 8px;">We're looking forward to seeing you there! Here's a quick reminder about the event:</p>
            <p style="margin: 0; color: #4b5b66;">
                Please arrive a little early for check-in, and bring this pass (printed or on your phone) along with a valid ID.
                If you have any questions before the event, feel free to reach out to the organizer.
            </p>
        </div>
    </div>
</body>
</html>
