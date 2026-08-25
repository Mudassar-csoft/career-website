@push('styles')
    <style>
        .site-error {
            background: linear-gradient(135deg, #edfafa 0%, #ffffff 52%, #e1f5f2 100%);
            min-height: 58vh;
            overflow: hidden;
            padding: 96px 0;
            position: relative;
        }
        .site-error::before,
        .site-error::after {
            background: #00aa9a;
            border-radius: 50%;
            content: "";
            opacity: .12;
            position: absolute;
        }
        .site-error::before { height: 360px; left: -130px; top: -170px; width: 360px; }
        .site-error::after { bottom: -220px; height: 470px; right: -130px; width: 470px; }
        .site-error-card { margin: 0 auto; max-width: 760px; position: relative; text-align: center; z-index: 1; }
        .site-error-code { color: #00a994; font: 800 clamp(5rem, 14vw, 10rem)/.8 "Montserrat", sans-serif; letter-spacing: -.09em; margin: 0 0 28px; padding-right: .09em; }
        .site-error-title { color: #173f52; font: 800 clamp(2rem, 4vw, 3.25rem)/1.1 "Montserrat", sans-serif; margin: 0 0 18px; }
        .site-error-copy { color: #526b75; font: 500 1.05rem/1.7 "Montserrat", sans-serif; margin: 0 auto 30px; max-width: 610px; }
        .site-error-actions { display: flex; flex-wrap: wrap; gap: 14px; justify-content: center; }
        .site-error-actions a { border-radius: 999px; font: 700 .95rem/1 "Montserrat", sans-serif; padding: 16px 25px; text-decoration: none; }
        .site-error-home { background: linear-gradient(100deg, #009cb3, #00c487); color: #fff; }
        .site-error-contact { border: 1px solid #00a994; color: #007f7a; }
        .site-error-actions a:hover { color: #fff; opacity: .9; }
        .site-error-contact:hover { background: #007f7a; }
        @media (max-width: 575px) { .site-error { min-height: 52vh; padding: 70px 0; } .site-error-copy { font-size: .94rem; } }
    </style>
@endpush

<section class="site-error" aria-labelledby="error-title">
    <div class="container">
        <div class="site-error-card">
            <p class="site-error-code" aria-hidden="true">{{ $status }}</p>
            <h1 id="error-title" class="site-error-title">{{ $heading }}</h1>
            <p class="site-error-copy">{{ $message }}</p>
            <div class="site-error-actions">
                <a class="site-error-home" href="{{ route('home') }}">Back to Home</a>
                <a class="site-error-contact" href="{{ route('contact-us') }}">Contact Us</a>
            </div>
        </div>
    </div>
</section>
