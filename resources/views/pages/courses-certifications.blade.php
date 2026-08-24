@extends('layouts.app')
@section('title', 'Courses & Certifications | Career Website')
@section('body_class', 'courses-page')
@push('styles')
<style>
    /* .courses-page .catalog-note {
        margin: 12px 0 0;
        font-size: 14px;
        line-height: 20px;
        color: #5f6b76;
    }
    .courses-page .catalog-note a {
        color: #009db8;
        font-weight: 600;
    }
    .courses-page .text-box.is-active,
    .courses-page .cor-block .box.is-active {
        border-color: #03c587;
        box-shadow: 0 0 0 2px rgba(3, 197, 135, 0.12);
    }
    .courses-page .course-empty {
        padding: 18px 20px;
        border: 1px solid #d9dfe5;
        border-radius: 12px;
        background: #fff;
        color: #5f6b76;
        font-size: 15px;
        line-height: 22px;
    }
    .courses-page .cor-block ul {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 18px;
        align-items: stretch;
    }
    .courses-page .cor-block ul li {
        width: auto;
        display: block;
    }
    .courses-page .cor-block ul li a {
        display: block;
        width: 100%;
        height: 100%;
    }
    .courses-page .cor-block ul li a .box {
        min-height: 184px;
        height: 100%;
        padding: 22px 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-start;
    }
    .courses-page .cor-block ul li a .box .img-hold {
        height: 56px;
        margin: 0 0 18px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .courses-page .cor-block ul li a .box .t-hold {
        width: 100%;
        display: flex;
        flex: 1 1 auto;
        flex-direction: column;
        align-items: center;
    }
    .courses-page .cor-block ul li a .box .t-hold h4 {
        min-height: 48px;
        margin: 0 0 10px;
        display: -webkit-box;
        overflow: hidden;
        text-align: center;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 2;
    }
    .courses-page .cor-block ul li a .box .t-hold p {
        min-height: 42px;
        margin: 0;
        font-size: 13px;
        line-height: 18px;
        color: #5f6b76;
        text-align: center;
        display: -webkit-box;
        overflow: hidden;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 2;
    }
    @media (max-width: 1200px) {
        .courses-page .cor-block ul {
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }
    } */
    @media (max-width: 767px) {
        .courses-page .cor-block ul {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }
    @media (max-width: 575px) {
        .courses-page .cor-block ul {
            grid-template-columns: 1fr;
        }
    }
</style>
@endpush
@section('content')
<section class="cer-bar">
    <h1 class="visually-hidden">Courses and Certifications</h1>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Build Skills. Earn Certifications. Advance Your Career.</h2>
                <p>
                    Explore Industry-Focused Courses and Certifications to Build Skills and Shape Your Future.
                </p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="form-block">
                    <form action="{{ route('courses-certifications') }}#all-courses" method="GET" id="course-hero-search-form">
                        @foreach ($selectedCategories as $selectedCategory)
                            <input type="hidden" name="categories[]" value="{{ $selectedCategory }}">
                        @endforeach
                        @foreach ($selectedModes as $selectedMode)
                            <input type="hidden" name="modes[]" value="{{ $selectedMode }}">
                        @endforeach
                        @foreach ($selectedDurations as $selectedDuration)
                            <input type="hidden" name="durations[]" value="{{ $selectedDuration }}">
                        @endforeach
                        <div class="input-group mb-4">
                            <input type="text" class="form-control sc-iput" name="search" value="{{ $search }}" placeholder="Search courses and certifications that match your goals." aria-describedby="button-addon2">
                            <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><img src="{{ asset('assets/images/icon94.svg') }}" alt="Search courses"></button>
                        </div>
                    </form>
                </div>
                <div class="cor-slider mb-lg-3">
                    @forelse ($categories as $cat)
                        <div>
                            <div class="text-box @if (in_array($cat->slug, $selectedCategories, true)) is-active @endif">
                                <a data-course-catalog-link href="{{ route('courses-certifications', ['categories' => [$cat->slug]]) }}#all-courses">{{ $cat->name }}</a>
                            </div>
                        </div>
                    @empty
                    @endforelse
                </div>
                <div class="btn-area">
                    <ul>
                        <li><a href="#all-courses">Explore all Courses</a></li>
                        <li><a href="#career-counseling">Get Started</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="c-text">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>
                    Thousands of Learners trust Career<br>
                    Institute to gain practical skills, earn recognized<br>
                    certifications, and build successful careers.
                </h2>
                <p>
                    Browse Course or Certification below to begin your success story.
                </p>
            </div>
        </div>
    </div>
</section>
@php
    $categoryIconMap = [
        'ai' => 'assets/images/icon97.svg',
        'data' => 'assets/images/icon97.svg',
        'web' => 'assets/images/icon98.svg',
        'software' => 'assets/images/icon98.svg',
        'marketing' => 'assets/images/icon99.svg',
        'commerce' => 'assets/images/icon99.svg',
        'graphic' => 'assets/images/icon100.svg',
        'ui' => 'assets/images/icon100.svg',
        'ux' => 'assets/images/icon100.svg',
        'creative' => 'assets/images/icon100.svg',
        'cyber' => 'assets/images/icon101.svg',
        'network' => 'assets/images/icon101.svg',
        'cloud' => 'assets/images/icon101.svg',
        'architecture' => 'assets/images/icon102.svg',
        'engineering' => 'assets/images/icon102.svg',
        'design' => 'assets/images/icon102.svg',
        'office' => 'assets/images/icon103.svg',
        'business' => 'assets/images/icon103.svg',
        'accounting' => 'assets/images/icon103.svg',
        'language' => 'assets/images/icon104.svg',
        'test' => 'assets/images/icon104.svg',
        'health' => 'assets/images/icon105.svg',
        'safety' => 'assets/images/icon105.svg',
        'compliance' => 'assets/images/icon105.svg',
        'freelanc' => 'assets/images/icon106.svg',
        'entrepreneur' => 'assets/images/icon106.svg',
        'international' => 'assets/images/icon107.svg',
        'certification' => 'assets/images/icon107.svg',
        'professional' => 'assets/images/icon108.svg',
        'soft' => 'assets/images/icon108.svg',
    ];

    $resolveCategoryIcon = function ($category) use ($categoryIconMap) {
        $haystack = strtolower($category->slug.' '.$category->name);

        foreach ($categoryIconMap as $keyword => $icon) {
            if (str_contains($haystack, $keyword)) {
                return asset($icon);
            }
        }

        return asset('assets/images/icon97.svg');
    };

    $buildCategorySummary = function ($category) {
        if ($category->courses_count === 0) {
            return 'No courses';
        }

        $titles = collect($category->courses ?? [])
            ->pluck('title')
            ->filter()
            ->take(2)
            ->values();

        $summary = $titles->implode(', ');

        if ($category->courses_count > 2) {
            $summary .= ' ...';
        }

        return $summary !== '' ? $summary : 'No courses';
    };

    $durationOptions = [
        '1-12' => '1 - 3 Months',
        '13-24' => '3 - 6 Months',
        '25-52' => '6 - 12 Months',
        'flexible' => 'Flexible Pace',
    ];
@endphp
<section class="cor-block">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Explore By Category</h2>
            </div>
            <div class="col-lg-12">
                <ul>
                    @forelse ($categories as $category)
                        <li>
                            <a data-course-catalog-link href="{{ route('courses-certifications', ['categories' => [$category->slug]]) }}#all-courses">
                                <div class="box @if (in_array($category->slug, $selectedCategories, true)) is-active @endif">
                                    <div class="img-hold">
                                        <img src="{{ $resolveCategoryIcon($category) }}" alt="{{ $category->name }}">
                                    </div>
                                    <div class="t-hold">
                                        <h4>{{ $category->name }}</h4>
                                        <p>{{ $buildCategorySummary($category) }}</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                    @empty
                        <li>
                            <div class="course-empty">No course categories available yet.</div>
                        </li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="feature-block">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="aos-init aos-animate" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1000">Featured Courses</h2>
                <p class="aos-init aos-animate mb-4" data-aos="fade-down" data-aos-anchor-placement="top-bottom" data-aos-duration="1100">
                    Build in-demand skills and move closer to your dream career with flexible online or on-campus learning led by expert Instructors.
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="feature-slider">
                    @forelse ($featuredCourses as $course)
                        <div>
                            <div class="box">
                                <div class="img-hold">
                                    <img src="{{ $course->image_url ?: asset('assets/images/img03.png') }}" alt="{{ $course->title }}" onerror="this.src='{{ asset('assets/images/img03.png') }}'; this.onerror=null;">
                                </div>
                                <div class="text-hold">
                                    <h3>{{ $course->title }}</h3>
                                    <ul>
                                        <li>
                                            Category:
                                            <span>{{ $course->category->name }}</span>
                                        </li>
                                        <li>
                                            Duration:
                                            <span><img src="assets/images/icon12.svg" alt="Career Institute feature icon"> {{ $course->duration_weeks ? $course->duration_weeks.' Weeks' : 'Flexible' }}</span>
                                        </li>
                                        <li>
                                            Mode:
                                            <span><img src="assets/images/icon09.svg" alt="Career Institute feature icon">{{ $course->mode->name }}</span>
                                        </li>
                                    </ul>
                                    <div class="btn-area">
                                        <a href="#" class="btn an-btn" data-bs-toggle="modal" data-bs-target="#admission-modal">Apply Now</a>
                                        <a href="{{ route('course-detail', $course->slug) }}" class="btn md-btn">More Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div>
                            <div class="course-empty">No featured courses match the current filters.</div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
        <div class="ru-banner">
            <div class="row justify-content-center">
                <div class="col-lg-9 col-xl-7">
                    <div class="row align-items-center">
                        <div class="col-md-8 col-sm-7">
                            <h2>
                                Ready to Upgrade Your Skills?
                            </h2>
                            <p>
                                Join our professional courses and certifications and<br>
                                take the next step towards a successful career.
                            </p>
                        </div>
                        <div class="col-md-4 col-sm-5">
                            <ul>
                                <li><a href="#career-counseling" class="btn gs-btn">Get Started</a></li>
                                <li><a href="#all-courses" class="btn eac-btn">Explore All Courses</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="acc-area" id="all-courses">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>All Courses & Certifications</h2>
                <p>
                    Browse our complete  range of courses and certification. Find the perfect program to achieve your career goals.
                </p>
            </div>
            <div class="col-lg-12">
                <div class="course-listing" id="course-catalog">
                    <div class="row">
                        <div class="col-xl-3 col-lg-4">
                            <aside class="course-sidebar">
                                <form action="{{ route('courses-certifications') }}#all-courses" method="GET" id="course-filter-form">
                                    <h2 class="sidebar-title">
                                        Search Courses
                                    </h2>
                                    <div class="search-box">
                                        <input type="text" class="form-control" name="search" value="{{ $search }}" placeholder="Search for Courses">
                                        <button type="submit"><i class="fa-solid fa-magnifying-glass"></i>
                                        </button>
                                    </div>
                                    <div class="filter-box">
                                        <div class="filter-title">
                                            <h4>Categories</h4>
                                            <a data-course-catalog-link href="{{ route('courses-certifications') }}#all-courses">Clear all</a>
                                        </div>
                                        <ul>
                                            @foreach ($categories as $category)
                                                <li>
                                                    <label>
                                                        <input type="checkbox" class="form-check-input course-filter-auto" name="categories[]" value="{{ $category->slug }}" @checked(in_array($category->slug, $selectedCategories, true))>
                                                        {{ $category->name }}
                                                    </label>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>

                                    <div class="filter-box">
                                        <div class="filter-title">
                                            <h4>Teaching Method</h4>
                                        </div>
                                        <ul>
                                            @foreach ($modes as $mode)
                                                <li>
                                                    <label>
                                                        <input type="checkbox" class="form-check-input course-filter-auto" name="modes[]" value="{{ $mode->slug }}" @checked(in_array($mode->slug, $selectedModes, true))>
                                                        {{ $mode->name }}
                                                    </label>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>

                                    <div class="filter-box">
                                        <div class="filter-title">
                                            <h4>Duration</h4>
                                        </div>
                                        <ul>
                                            @foreach ($durationOptions as $durationValue => $durationLabel)
                                                <li>
                                                    <label>
                                                        <input type="checkbox" class="form-check-input course-filter-auto" name="durations[]" value="{{ $durationValue }}" @checked(in_array($durationValue, $selectedDurations, true))>
                                                        {{ $durationLabel }}
                                                    </label>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </form>
                            </aside>
                        </div>

                        <div class="col-xl-9 col-lg-8">
                            <div class="course-content">
                                <div class="row mb-4">
                                    <div class="col-lg-12">
                                        <div class="course-top-bar">
                                            <h3>
                                                <strong>Showing</strong> {{ $courses->count() }} of {{ $courses->total() }} Courses
                                            </h3>
                                            @if ($search !== '' || ! empty($selectedCategories) || ! empty($selectedModes) || ! empty($selectedDurations))
                                                <p class="catalog-note">
                                                    Filtered results.
                                                    <a data-course-catalog-link href="{{ route('courses-certifications') }}#all-courses">Reset catalog</a>
                                                </p>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <!-- Cards -->

                                <div class="row g-3">
                                    @forelse ($courses as $course)
                                        <div class="col-xl-4 col-md-6">
                                            <div class="course-card">
                                                <!-- Course Image -->
                                                <div class="course-image">
                                                    <img src="{{ $course->image_url ?: asset('assets/images/img03.png') }}" alt="{{ $course->title }}" onerror="this.src='{{ asset('assets/images/img03.png') }}'; this.onerror=null;">
                                                </div>
                                                <!-- Course Content -->
                                                <div class="course-content">
                                                    <h3>
                                                        {{ $course->title }}
                                                    </h3>
                                                    <ul class="course-info">
                                                        <li>
                                                            Category:
                                                            <span>{{ $course->category->name }}</span>
                                                        </li>
                                                        <li>
                                                            Duration:
                                                            <span><img src="assets/images/icon12.svg" alt="Career Institute feature icon"> {{ $course->duration_weeks ? $course->duration_weeks.' Weeks' : 'Flexible' }}</span>
                                                        </li>
                                                        <li>
                                                            Mode:
                                                            <span><img src="assets/images/icon09.svg" alt="Career Institute feature icon">{{ $course->mode->name }}</span>
                                                        </li>
                                                    </ul>
                                                    <!-- Buttons -->

                                                    <div class="course-buttons">
                                                        <a href="#" class="btn an-btn" data-bs-toggle="modal" data-bs-target="#admission-modal">Apply Now</a>
                                                        <a href="{{ route('course-detail', $course->slug) }}"
                                                        class="btn detail-btn">
                                                            More Details
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="col-lg-12">
                                            <div class="course-empty">No courses match the current search or filters.</div>
                                        </div>
                                    @endforelse
                                </div>

                                @if ($courses->hasPages())
                                    @php
                                        $startPage = max(1, $courses->currentPage() - 2);
                                        $endPage = min($courses->lastPage(), $courses->currentPage() + 2);
                                    @endphp
                                    <nav class="pagination-wrap mt-3">
                                        <ul class="pagination justify-content-center">
                                            <li class="page-item @if ($courses->onFirstPage()) disabled @endif">
                                                <a class="page-link" href="{{ $courses->onFirstPage() ? '#' : $courses->previousPageUrl().'#all-courses' }}">
                                                    <i class="fas fa-chevron-left"></i>
                                                    Previous
                                                </a>
                                            </li>
                                            @foreach ($courses->getUrlRange($startPage, $endPage) as $page => $url)
                                                <li class="page-item @if ($page === $courses->currentPage()) active @endif">
                                                    <a class="page-link" href="{{ $url }}#all-courses">
                                                        {{ $page }}
                                                    </a>
                                                </li>
                                            @endforeach
                                            <li class="page-item @if (! $courses->hasMorePages()) disabled @endif">
                                                <a class="page-link" href="{{ $courses->hasMorePages() ? $courses->nextPageUrl().'#all-courses' : '#' }}">
                                                    Next
                                                   <i class="fas fa-chevron-right"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="info-bar" id="career-counseling">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>
                    Request a Free Career Counseling Session
                </h2>
                <h5>
                    Book a complimentary career counselling session to discuss your goals and create a clear path to success. Sessions are
                    available Monday to Saturday, from 10:00 AM to 6:00 PM, via WhatsApp, Webex, Google Meet, or Microsoft Teams.
                </h5>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 mb-4">
                <ul>
                    <li>
                        <div class="box">
                            <div class="img-hold">
                                <img src="{{ asset('assets/images/icon20.svg') }}" alt="Career Institute feature icon">
                            </div>
                            <div class="t-bar">
                                <h3>Call Us Today</h3>
                                <p>0341-4444010</p>
                                <p>0314-4444010</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="box">
                            <div class="img-hold">
                                <img src="{{ asset('assets/images/icon21.svg') }}" alt="Career Institute feature icon">
                            </div>
                            <div class="t-bar">
                                <h3>Email</h3>
                                <p>info@career.edu.pk</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="box">
                            <div class="img-hold">
                                <img src="{{ asset('assets/images/icon22.svg') }}" alt="Career Institute feature icon">
                            </div>
                            <div class="t-bar">
                                <h3>Webex Meetings</h3>
                                <p>Career.pk</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="box">
                            <div class="img-hold">
                                <img src="{{ asset('assets/images/icon136.svg') }}" alt="Career Institute feature icon">
                            </div>
                            <div class="t-bar">
                                <h3>Google Meet</h3>
                                <p>Career.pk</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="box">
                            <div class="img-hold">
                                <img src="{{ asset('assets/images/icon137.svg') }}" alt="Career Institute feature icon">
                            </div>
                            <div class="t-bar">
                                <h3>Microsoft Team</h3>
                                <p>Career.pk</p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-lg-12">
                <div class="form-block">
                    <h2>
                        Fill Out the Form Below
                    </h2>
                    <p>
                        Please complete the form, and one of our representatives will get back to you shortly.
                    </p>
                    <form class="row g-3 lead-form" method="POST" action="{{ route('subscribers.store') }}">
                        @csrf
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="name" placeholder="Name">
                        </div>
                        <div class="col-md-6">
                            <input type="email" class="form-control" name="email" placeholder="Email">
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Subject">
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="phone" placeholder="Phone no">
                        </div>
                        <div class="col-md-12">
                            <textarea placeholder="Questions & Quires" class="form-control" rows="9"></textarea>
                        </div>
                        <div class="col-12 text-center mt-4">
                            <button type="submit" class="btn sm-btn">Send Message</button>
                        </div>
                        <input type="hidden" name="source" value="Courses Enroll">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="soical-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Keep in Touch</h2>
                <ul>
                    <li><a href="https://www.facebook.com/careerinstituteofficial" target="_blank" rel="noopener noreferrer" aria-label="Career Institute on Facebook"><img src="{{ asset('assets/images/fb.png') }}" alt="Facebook"></a></li>
                    <li><a href="https://www.instagram.com/careerinstituteofficial" target="_blank" rel="noopener noreferrer" aria-label="Career Institute on Instagram"><img src="{{ asset('assets/images/instagram.png') }}" alt="Instagram"></a></li>
                    <li><a href="https://www.youtube.com/@CareerInstitutepk" target="_blank" rel="noopener noreferrer" aria-label="Career Institute on YouTube"><img src="{{ asset('assets/images/youtube.png') }}" alt="YouTube"></a></li>
                    <li><a href="#"><img src="{{ asset('assets/images/tiktok.png') }}" alt="TikTok"></a></li>
                    <li><a href="https://www.linkedin.com/company/careerinstituteofficial/" target="_blank" rel="noopener noreferrer" aria-label="Career Institute on LinkedIn"><img src="{{ asset('assets/images/linkdin.png') }}" alt="LinkedIn"></a></li>
                    <li><a href="https://twitter.com/careerofficials" target="_blank" rel="noopener noreferrer" aria-label="Career Institute on X"><img src="{{ asset('assets/images/x.png') }}" alt="X"></a></li>
                    <li><a href="https://wa.me/923144444010" target="_blank" rel="noopener noreferrer" aria-label="Chat with Career Institute on WhatsApp"><img src="{{ asset('assets/images/wp.png') }}" alt="WhatsApp"></a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
@endsection
@push('scripts')
<script>
    $(".location-card").click(function () {
        $(".location-card")
            .removeClass("active");
        $(this)
            .addClass("active");
        let map =
            $(this).data("map");
        $("#locationMap")
            .attr("src", map);
    });
</script>
<script>
    if (document.querySelector(".cor-slider")) {
        $(".cor-slider").slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2500,
            speed: 1200,
            cssEase: "linear",
            arrows: true,
            pauseOnHover: true,
            infinite: true,
            responsive: [
                {
                breakpoint: 1200,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        autoplaySpeed: 2500,
                        speed: 1200,
                    }
                },
                {
                breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                    }
                },
                {
                breakpoint: 480,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        arrows: false,
                    }
                }
            ]
        });
    }
</script>
<script>
    (function () {
        function getCatalogUrl(url, formData) {
            var catalogUrl = new URL(url, window.location.origin);

            catalogUrl.hash = '';

            if (formData) {
                catalogUrl.search = new URLSearchParams(formData).toString();
            }

            return catalogUrl;
        }

        function loadCatalog(url, shouldScroll) {
            var catalogUrl = getCatalogUrl(url);
            var currentCatalog = document.getElementById('course-catalog');

            if (!currentCatalog) {
                window.location.assign(url);
                return;
            }

            currentCatalog.setAttribute('aria-busy', 'true');

            fetch(catalogUrl.toString(), {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
                .then(function (response) {
                    if (!response.ok) {
                        throw new Error('Unable to load courses.');
                    }

                    return response.text();
                })
                .then(function (html) {
                    var documentResponse = new DOMParser().parseFromString(html, 'text/html');
                    var nextCatalog = documentResponse.getElementById('course-catalog');

                    if (!nextCatalog) {
                        throw new Error('Course catalog was not found.');
                    }

                    currentCatalog.replaceWith(nextCatalog);
                    window.history.pushState({}, '', catalogUrl.pathname + catalogUrl.search + '#all-courses');

                    if (shouldScroll) {
                        document.getElementById('all-courses').scrollIntoView({ behavior: 'smooth', block: 'start' });
                    }
                })
                .catch(function () {
                    window.location.assign(url);
                });
        }

        document.addEventListener('submit', function (event) {
            var form = event.target;

            if (!form.matches('#course-filter-form, #course-hero-search-form')) {
                return;
            }

            event.preventDefault();
            var catalogForm = document.getElementById('course-filter-form');
            var formData = form.id === 'course-hero-search-form' && catalogForm
                ? new FormData(catalogForm)
                : new FormData(form);

            if (form.id === 'course-hero-search-form') {
                formData.set('search', form.elements.search.value);
            }

            var catalogUrl = getCatalogUrl(form.action, formData);
            loadCatalog(catalogUrl, form.id === 'course-hero-search-form');
        });

        document.addEventListener('change', function (event) {
            if (!event.target.matches('#course-filter-form .course-filter-auto')) {
                return;
            }

            var filterForm = event.target.closest('form');
            loadCatalog(getCatalogUrl(filterForm.action, new FormData(filterForm)), false);
        });

        document.addEventListener('click', function (event) {
            var catalogLink = event.target.closest('a[data-course-catalog-link]');

            if (catalogLink) {
                event.preventDefault();
                loadCatalog(catalogLink.href, true);
                return;
            }

            var paginationLink = event.target.closest('#course-catalog .pagination a');

            if (paginationLink && paginationLink.getAttribute('href') !== '#') {
                event.preventDefault();
                loadCatalog(paginationLink.href, true);
            }
        });
    })();
</script>
@endpush
