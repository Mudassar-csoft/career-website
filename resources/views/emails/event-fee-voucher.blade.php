<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Complete Your Registration for {{ $event->title }}</title>
</head>
<body style="font-family: Arial, sans-serif; color: #1d2b36; background: #f4f7f9; padding: 24px;">
    <div style="max-width: 560px; margin: 0 auto; background: #fff; border-radius: 12px; overflow: hidden;">
        <div style="background: linear-gradient(90deg, #009DB8 0%, #03C587 100%); padding: 20px 28px;">
            <img src="{{ asset('assets/images/logo.svg') }}" alt="Career Institute" style="height: 32px;">
        </div>
        <div style="padding: 28px;">
            <h2 style="margin: 0 0 4px;">Thanks for registering, {{ $registration->name }}!</h2>
            <p style="color: #7c8a94; margin: 0 0 20px;">One last step — your seat is reserved but not confirmed until we receive your fee.</p>

            <div style="background: #fef3e0; border-radius: 10px; padding: 18px 20px; margin-bottom: 20px;">
                <h3 style="margin: 0 0 12px; font-size: 18px;">{{ $event->title }}</h3>
                <table style="width: 100%; font-size: 14px; color: #1d2b36;">
                    <tr>
                        <td style="padding: 4px 0; color: #7c8a94;">Date</td>
                        <td style="padding: 4px 0; text-align: right; font-weight: 600;">{{ $event->event_date->format('d M, Y') }}</td>
                    </tr>
                    <tr>
                        <td style="padding: 4px 0; color: #7c8a94;">Venue</td>
                        <td style="padding: 4px 0; text-align: right; font-weight: 600;">{{ $event->venue }}</td>
                    </tr>
                    <tr>
                        <td style="padding: 4px 0; color: #7c8a94;">Amount Due</td>
                        <td style="padding: 4px 0; text-align: right; font-weight: 700; color: #b7791f;">Rs. {{ number_format($event->fee_amount, 2) }}</td>
                    </tr>
                </table>
            </div>

            <p style="margin: 0 0 20px; color: #4b5b66;">
                Once you've paid the event fee, upload your payment receipt using the button below.
                We'll review it and email your event pass as soon as it's confirmed.
            </p>

            <div style="text-align: center; margin-bottom: 8px;">
                <a href="{{ $uploadUrl }}" style="display: inline-block; padding: 12px 28px; border-radius: 8px; background: linear-gradient(90deg, #009DB8 0%, #03C587 100%); color: #fff; font-weight: 700; text-decoration: none;">Upload Payment Receipt</a>
            </div>
            <p style="text-align: center; font-size: 12px; color: #9aa7b0; margin-top: 12px;">Or copy this link: {{ $uploadUrl }}</p>
        </div>
    </div>
</body>
</html>
