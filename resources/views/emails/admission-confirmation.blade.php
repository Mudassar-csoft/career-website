<!doctype html>
<html lang="en">
<body style="font-family:Arial,sans-serif;color:#1d2b36;line-height:1.5;">
    <p>Hi {{ $subscriber->name }},</p>

    <p>Thank you for your interest in Career Institute. We have received your inquiry for {{ $course ?: 'your selected course or certification' }}.</p>

    <p>Our team will contact you shortly with course details and admission guidance.</p>

    <p>
        Phone: 0314-4444010<br>
        Email: <a href="mailto:info@career.edu.pk">info@career.edu.pk</a><br>
        Website: <a href="https://www.career.edu.pk">www.career.edu.pk</a>
    </p>

    <p>Best regards,<br><strong>Career Institute</strong></p>
</body>
</html>
