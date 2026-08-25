<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @php
        $routeName = request()->route()?->getName();
        $pageTitle = trim($__env->yieldContent('title')) ?: 'Career Institute';
        $providedDescription = trim(strip_tags($__env->yieldContent('meta_description')));
        $routeDescription = config('seo.descriptions.'.$routeName, config('seo.default_description'));
        $descriptionSource = $providedDescription ?: $routeDescription;
        if (\Illuminate\Support\Str::length($descriptionSource) < 140) {
            $descriptionSource = trim($descriptionSource.' '.$routeDescription);
        }
        $metaDescription = \Illuminate\Support\Str::limit($descriptionSource, 150, '');
        $metaKeywords = trim(strip_tags($__env->yieldContent('meta_keywords')));
        $ogImage = trim($__env->yieldContent('og_image')) ?: asset(config('seo.default_image'));
        if (! \Illuminate\Support\Str::startsWith($ogImage, ['http://', 'https://'])) {
            $ogImage = url($ogImage);
        }
        $canonicalUrl = url()->current();
    @endphp
    <title>{{ $pageTitle }}</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/favicon.svg') }}">
    <meta name="description" content="{{ $metaDescription }}">
    @if ($metaKeywords !== '')
        <meta name="keywords" content="{{ $metaKeywords }}">
    @endif
    <link rel="canonical" href="{{ $canonicalUrl }}">
    <meta property="og:type" content="@yield('og_type', 'website')">
    <meta property="og:site_name" content="Career Institute">
    <meta property="og:title" content="{{ $pageTitle }}">
    <meta property="og:description" content="{{ $metaDescription }}">
    <meta property="og:url" content="{{ $canonicalUrl }}">
    <meta property="og:image" content="{{ $ogImage }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $pageTitle }}">
    <meta name="twitter:description" content="{{ $metaDescription }}">
    <meta name="twitter:image" content="{{ $ogImage }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}?v={{ filemtime(public_path('assets/css/main.css')) }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css">
    <style>
        .seo-breadcrumb {
            background: #f1f8f6;
            border-bottom: 1px solid #dcece7;
            color: #4d6270;
            font: 500 13px/1.4 "Montserrat", sans-serif;
            padding: 10px 0;
        }
        .seo-breadcrumb ol {
            align-items: center;
            display: flex;
            flex-wrap: wrap;
            gap: 7px;
            list-style: none;
            margin: 0;
            padding: 0;
        }
        .seo-breadcrumb li {
            align-items: center;
            display: flex;
            gap: 7px;
        }
        .seo-breadcrumb li:not(:last-child)::after {
            color: #78919a;
            content: "/";
        }
        .seo-breadcrumb a {
            color: #017e8f;
            text-decoration: none;
        }
        .seo-breadcrumb a:hover,
        .seo-breadcrumb a:focus-visible {
            text-decoration: underline;
        }
        .seo-breadcrumb [aria-current="page"] {
            color: #173f52;
            font-weight: 700;
        }
    </style>
    @stack('styles')
</head>
<body class="@yield('body_class')">
    <div id="wrapper">
        @include('partials.header')
        @unless (request()->routeIs('home') || trim($__env->yieldContent('hide_breadcrumb')) === 'true')
            @include('components.seo-breadcrumb')
        @endunless
        <main role="main">
            @yield('content')
        </main>
        @include('partials.footer')
    </div>

    @include('partials.modals')

    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}?v={{ filemtime(public_path('assets/js/bootstrap.bundle.min.js')) }}"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js"></script>
    <script src="{{ asset('assets/js/app.js') }}?v={{ filemtime(public_path('assets/js/app.js')) }}"></script>
    <script src="{{ asset('assets/js/slider.js') }}?v={{ filemtime(public_path('assets/js/slider.js')) }}"></script>
    <script src="{{ asset('assets/js/home.js') }}?v={{ filemtime(public_path('assets/js/home.js')) }}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        if (window.AOS) {
            AOS.init();
        }
    </script>
    @stack('scripts')
</body>
</html>
