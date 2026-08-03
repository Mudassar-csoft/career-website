<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ $title }}</title>
</head>
<body style="font-family: Arial, sans-serif; color: #1d2b36; background: #f4f7f9; padding: 24px;">
    <div style="max-width: 560px; margin: 0 auto; background: #fff; border-radius: 12px; overflow: hidden;">
        <div style="background: linear-gradient(90deg, #009DB8 0%, #03C587 100%); padding: 20px 28px;">
            <img src="{{ asset('assets/images/logo.svg') }}" alt="Career Institute" style="height: 32px;">
        </div>
        <div style="padding: 28px;">
            <h2 style="margin: 0 0 16px;">{{ $title }}</h2>
            <div>{!! nl2br(e($body)) !!}</div>
        </div>
    </div>
</body>
</html>
