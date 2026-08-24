@extends('layouts.app')
@section('title', 'Home | Career Website')
@section('body_class', '')
@section('content')
<section class="hero-section">
    <div class="container">
        <div class="row">
            <div class=	"col-lg-7">
                <h1>Get Free Career Counseling</h1>
                <p>
                    Complete the form, and our career advisors will contact you shortly with<br>
                    information about courses, admissions, coworking spaces, study-abroad<br>
                    opportunities, scholarships, events, and career development.
                </p>
                <div class="form-block">
                    <form class="row g-3 lead-form" method="POST" action="{{ route('subscribers.store') }}">
                        @csrf
                        <div class="col-12 col-sm-6">
                            <input type="text" class="form-control" name="name" placeholder="Full Name">
                        </div>
                        <div class="col-12 col-sm-6">
                            <input type="text" class="form-control" placeholder="Course">
                        </div>
                        <div class="col-12 col-sm-6">
                            <input type="text" class="form-control" name="phone" placeholder="Contact">
                        </div>
                        <div class="col-12 col-sm-6">
                            <input type="email" class="form-control" name="email" placeholder="example@gmail.com">
                        </div>
                        <div class="col-12 col-sm-6">
                            <select class="form-select">
                                <option selected>Pakistan</option>
                            </select>
                        </div>
                        <div class="col-12 col-sm-6">
                            <input type="text" class="form-control" placeholder="City">
                        </div>
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck" checked>
                                <label class="form-check-label" for="gridCheck">
                                    Subscribe to our newsletter
                                </label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn apply-btn">Apply Now</button>
                        </div>
                        <input type="hidden" name="source" value="Homepage Hero">
                    </form>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="orbit-wrapper">
                    <!-- Outer Orbit -->
                    <div class="orbit orbit-outer">
                        <span style="--i:0"></span>
                        <span style="--i:1"></span>
                        <span style="--i:2"></span>
                        <span style="--i:3"></span>
                        <span style="--i:4"></span>
                        <span style="--i:5"></span>
                        <span style="--i:6"></span>
                        <span style="--i:7"></span>
                    </div>
                    <!-- Inner Orbit -->
                    <div class="orbit orbit-inner">
                        <span style="--i:0"></span>
                        <span style="--i:1"></span>
                        <span style="--i:2"></span>
                        <span style="--i:3"></span>
                        <span style="--i:4"></span>
                        <span style="--i:5"></span>
                        <span style="--i:6"></span>
                        <span style="--i:7"></span>
                    </div>
                    <!-- Center Image -->
                    <div class="center-image">
                        <img src="assets/images/img15.png" alt="Career Institute student learning">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="counter-box">
                    <div class="counter-item">
                        <div class="icon">
                            <img src="assets/images/icon01.svg" alt="Career Institute feature icon">
                        </div>
                        <h2 class="counter" data-target="150000">0</h2>
                        <p>Alumni</p>
                    </div>
                    <div class="counter-item">
                        <div class="icon">
                            <img src="assets/images/icon02.svg" alt="Career Institute feature icon">
                        </div>
                        <h2 class="counter" data-target="50">0</h2>
                        <p>Affiliations</p>
                    </div>
                    <div class="counter-item">
                        <div class="icon">
                            <img src="assets/images/icon03.svg" alt="Career Institute feature icon">
                        </div>
                        <h2 class="counter" data-target="100">0</h2>
                        <p>Programs</p>
                    </div>
                    <div class="counter-item">
                        <div class="icon">
                            <img src="assets/images/icon04.svg" alt="Career Institute feature icon">
                        </div>
                        <h2 class="counter" data-target="15">0</h2>
                        <p>Campuses</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="news-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-4 mb-md-0">
                <div class="row d-md-none">
                    <div class="col-12">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">News</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Events</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                                <div class="news-bar" data-aos="fade-up" data-aos-anchor-placement="top-center" data-aos-duration="1000">
                                    <div class="news-slider">
                                        @forelse ($newsWidget as $index => $newsItem)
                                            <div>
                                                <div class="box {{ ['s-blue', 's-black', 's-green'][$index % 3] }}">
                                                    <p>
                                                        {{ $newsItem->title }}
                                                        <a href="{{ route('news-detail', $newsItem->slug) }}">Read more...</a>
                                                    </p>
                                                    <div class="d-bar">
                                                        <img src="assets/images/icon05.svg" alt="Career Institute feature icon">
                                                        <span>{{ $newsItem->created_at->format('d-m-Y') }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                        @endforelse
                                    </div>
                                    <a href="{{ route('news') }}" class="btn r-btn">Read More</a>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                                <div class="event-bar" data-aos="fade-up" data-aos-anchor-placement="top-center" data-aos-duration="1200">
                                    <ul>
                                        @forelse ($eventsWidget as $upcomingEvent)
                                            <li>
                                                <a href="{{ route('events.show', $upcomingEvent) }}" style="display:flex;flex-wrap:wrap;width:100%;color:inherit;text-decoration:none;">
                                                    <div class="d-info">
                                                        <h3>
                                                            {{ $upcomingEvent->event_date->format('d') }} <span>{{ $upcomingEvent->event_date->format('M') }}</span>
                                                        </h3>
                                                    </div>
                                                    <div class="t-bar">
                                                        <p>
                                                            {{ $upcomingEvent->title }}
                                                        </p>
                                                        <span><i class="fas fa-map-marker-alt"></i> {{ $upcomingEvent->campus }}</span>
                                                    </div>
                                                </a>
                                            </li>
                                        @empty
                                        @endforelse
                                    </ul>
                                    <a href="{{ route('events') }}" class="btn event-btn">All Events</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-4 mb-lg-0 d-none d-md-flex">
                    <div class="col-md-6">
                        <div class="news-bar" data-aos="fade-up" data-aos-duration="800" data-aos-offset="80">
                            <h2>News</h2>
                            <div class="news-slider">
                                @forelse ($newsWidget as $index => $newsItem)
                                    <div>
                                        <div class="box {{ ['s-blue', 's-black', 's-green'][$index % 3] }}">
                                            <p>
                                                {{ $newsItem->title }}
                                                <a href="{{ route('news-detail', $newsItem->slug) }}">Read more...</a>
                                            </p>
                                            <div class="d-bar">
                                                <img src="assets/images/icon05.svg" alt="Career Institute feature icon">
                                                <span>{{ $newsItem->created_at->format('d-m-Y') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                @endforelse
                            </div>
                            <a href="{{ route('news') }}" class="btn r-btn">Read More</a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="event-bar" data-aos="fade-up" data-aos-duration="1100" data-aos-offset="80">
                            <h2>Events</h2>
                            <ul>
                                @forelse ($eventsWidget as $upcomingEvent)
                                    <li>
                                        <a href="{{ route('events.show', $upcomingEvent) }}" style="display:flex;flex-wrap:wrap;width:100%;color:inherit;text-decoration:none;">
                                            <div class="d-info">
                                                <h3>
                                                    {{ $upcomingEvent->event_date->format('d') }} <span>{{ $upcomingEvent->event_date->format('M') }}</span>
                                                </h3>
                                            </div>
                                            <div class="t-bar">
                                                <p>
                                                    {{ $upcomingEvent->title }}
                                                </p>
                                                <span><i class="fas fa-map-marker-alt"></i> {{ $upcomingEvent->campus }}</span>
                                            </div>
                                        </a>
                                    </li>
                                @empty
                                @endforelse
                            </ul>
                            <a href="{{ route('events') }}" class="btn event-btn">All Events</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="about-bar" data-aos="fade-up" data-aos-duration="1400" data-aos-offset="80">
                    <h2><span>Why</span> Choose Us</h2>
                    <div class="img-hold">
                        <img src="assets/images/img75.png" alt="Career Institute professional training">
                    </div>
                    <h3>About Career Institute</h3>
                    <p>
                        Since 2010, Career Institute has empowered more
                        than 150,000 learners worldwide through
                        industry-focused training, up-to-date curricula
                        and certified instructors. Beyond education, we
                        support freelancers, professionals and technology
                        startups through modern coworking spaces
                        designed for growth and collaboration. Advance your skills, career and business with Career
                        Institute - where education meets innovation.
                    </p>
                    <a href="{{ route('about') }}" class="btn r-btn">Read More</a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="vision-bar">
    <div class="container">
        <div class="g-box">
            <div class="row">
                <div class="col-lg-12">
                    <h2 data-aos="fade-up" data-aos-anchor-placement="top-center" data-aos-duration="1000">Guiding Vision from Our Directors</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 border-lg-end mb-4 mb-lg-0">
                    <div class="t-detail">
                        <div class="img-hold aos-init aos-animate" data-aos="zoom-out-down" data-aos-duration="1000">
                            <img src="assets/images/img02.png" alt="Career Institute campus">
                        </div>
                        <h6 class="aos-init aos-animate" data-aos="zoom-out-up" data-aos-duration="800">Adeel Javaid - Director</h6>
                        <p class="aos-init aos-animate" data-aos="zoom-out-down" data-aos-duration="1100">
                            <span class=" coma"><img src="assets/images/icon08.png" alt="Career Institute feature icon"></span><b>Our vision</b>  is to transform education into meaningful<br>
                            careers. Since 2010, Career Institute has delivered<br>
                            practical, industry-focused training, empowering<br>
                            learners with relevant skills, confidence and direction<br>
                            to succeed in a rapidly evolving global workforce.<span class="round coma"><img src="assets/images/icon08.png" alt="Career Institute feature icon"></span>
                        </p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="t-detail">
                        <div class="img-hold aos-init aos-animate" data-aos="zoom-out-down" data-aos-duration="1000">
                            <img src="assets/images/img74.png" alt="">
                        </div>
                        <h6 class="aos-init aos-animate" data-aos="zoom-out-up" data-aos-duration="800">Samreen Rafiq - Director</h6>
                        <p class="aos-init aos-animate" data-aos="zoom-out-down" data-aos-duration="1100">
                            <span class="coma"><img src="assets/images/icon08.png" alt="Career Institute feature icon"></span>
                            <b>At Career</b> Institute  we believe every learner has unique<br>
                            potential. Through an inclusive and inspiring environment,<br>
                            we develop practical skills, confidence and creativity,<br>
                            empowering students to pursue meaningful careers<br>
                            and achieve lifelong professional growth.<span class="round coma"><img src="assets/images/icon08.png" alt="Career Institute feature icon"></span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="feature-block">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1000">Featured Courses</h2>
                <p data-aos="fade-down" data-aos-anchor-placement="top-bottom" data-aos-duration="1100">
                    Elevate Your Skills and Land Your Dream Job - Whether you prefer the convenience of learning from home or the
                    advantages of direct sessions on campus with our expert instructors, we've got you covered!
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
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>
<section class="video-block">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2  data-aos="zoom-in" data-aos-duration="1000">Explore our campuses through an immersive virtual tour</h2>
                <p  data-aos="zoom-in" data-aos-duration="1200">
                    Elevate Your Skills, Unlock Earning Opportunities, and Land Your Dream Job Learn online from the comfort of your home or join
                    interactive on-campus sessions with our expert instructors -the choice is yours.
                </p>
                <a href="https://www.youtube.com/@CareerInstitutepk/videos" class="btn ep-btn mb-5">Explore Campuses</a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        @foreach (config('campus_videos', []) as $campusVideo)
                            <div class="swiper-slide">
                                <div class="video-card">
                                    <img src="{{ asset($campusVideo['thumbnail']) }}" alt="{{ $campusVideo['name'] }}">
                                    @if (!empty($campusVideo['video_url']))
                                        <button
                                            class="play-btn"
                                            type="button"
                                            data-video="{{ $campusVideo['video_url'] }}"
                                            aria-label="Play {{ $campusVideo['name'] }} virtual tour"
                                        >
                                            <img src="{{ asset('assets/images/ply-btn.png') }}" alt="Play video">
                                        </button>
                                    @endif
                                </div>
                                <div class="swipe-text">
                                    <h3>{{ $campusVideo['name'] }}</h3>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="review-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800">
                    What Our Alumni Say
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="testimonial-section">
                    <div class="testimonial-slider">
                        @forelse ($alumni as $alum)
                            <div class="item">
                                <div class="card-wrap">
                                    <div class="box">
                                        <div class="img-hold">
                                            <img src="{{ $alum->photo_url }}" alt="{{ $alum->name }}" onerror="this.src='{{ asset('assets/images/img05.png') }}'; this.onerror=null;">
                                        </div>
                                        <div class="rt-bar">
                                            <h3>{{ $alum->name }}</h3>
                                            <span>{{ $alum->designation }}</span>
                                            <h5>Review</h5>
                                            <p>{{ $alum->review }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                        @endforelse
                    </div>
                </section>
            </div>
        </div>
    </div>
</section>
<section class="logo-bar">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800">Collaborations with leading Organizations</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="logo-slider">
                    @foreach ([
                        ['image' => 'img76.png', 'name' => 'Linux Professional Institute'],
                        ['image' => 'img77.png', 'name' => 'VMware by Broadcom'],
                        ['image' => 'img78.png', 'name' => 'Kryterion'],
                        ['image' => 'img79.png', 'name' => 'Linux Professional Institute'],
                        ['image' => 'img80.png', 'name' => 'VMware by Broadcom'],
                        ['image' => 'img81.png', 'name' => 'Kryterion'],
                        ['image' => 'img82.png', 'name' => 'Kryterion'],
                        ['image' => 'img83.png', 'name' => 'Kryterion'],
                        ['image' => 'img84.png', 'name' => 'Kryterion'],
                        ['image' => 'img85.png', 'name' => 'Kryterion'],
                    ] as $collaborator)
                        <div>
                            <div class="img-hold">
                                <img src="{{ asset('assets/images/'.$collaborator['image']) }}" alt="{{ $collaborator['name'] }}">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<section class="blog-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="900">Latest Blogs</h2>
            </div>
        </div>
        <div class="row mb-5">
            @forelse ($blogs as $index => $blog)
                <div class="col-lg-3 col-sm-6 mb-4 mb-lg-0 aos-init aos-animate" data-aos="{{ $index % 2 === 0 ? 'flip-left' : 'flip-right' }}" data-aos-duration="{{ 1000 + $index * 100 }}">
                    <a href="{{ route('blog-detail', $blog->slug) }}" class="block" style="display:block;color:inherit;text-decoration:none;">
                        <div class="img-hold">
                            <img src="{{ $blog->image_url ?: asset('assets/images/img13.png') }}" alt="{{ $blog->title }}" onerror="this.src='{{ asset('assets/images/img13.png') }}'; this.onerror=null;">
                        </div>
                        <div class="t-bar">
                            <h3>{{ $blog->title }}</h3>
                            <p>{{ $blog->excerpt ?: \Illuminate\Support\Str::limit(strip_tags($blog->content), 90) }}</p>
                        </div>
                    </a>
                </div>
            @empty
            @endforelse
        </div>
        <div class="row">
            <div class="col-lg-12" aos-init aos-animate" data-aos="fade-up" data-aos-duration="1400">
                <div class="btn-box">
                    <a href="{{ route('blogs') }}" class="btn rm-btn">Read More</a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="partner-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1000">
                <h2>
                    Become a Partner
                </h2>
            </div>
            <div class="col-lg-12">
                <div class="form-block">
                    <form class="row g-3 lead-form" method="POST" action="{{ route('subscribers.store') }}">
                        @csrf
                        <div class="col-sm-6 aos-init aos-animate" data-aos="fade-up" data-aos-duration="800">
                            <input type="text" class="form-control" name="name" placeholder="Full Name">
                        </div>
                        <div class="col-sm-6 aos-init aos-animate" data-aos="fade-up" data-aos-duration="900">
                            <input type="text" class="form-control" name="phone" placeholder="Contact no">
                        </div>
                        <div class="col-sm-6 aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">
                            <input type="email" class="form-control" name="email" placeholder="Email Address">
                        </div>
                        <div class="col-sm-6 aos-init aos-animate" data-aos="fade-up" data-aos-duration="1100">
                            <input type="text" class="form-control" placeholder="Business Interest">
                        </div>
                        <div class="col-md-12 aos-init aos-animate" data-aos="fade-up" data-aos-duration="1200">
                            <textarea rows="7" class="form-control" placeholder="Describe Partnership opportunity"></textarea>
                        </div>
                        <div class="col-12 text-center aos-init aos-animate" data-aos="fade-up" data-aos-duration="1300">
                            <button type="submit" class="btn apply-btn mt-4">Apply Now</button>
                        </div>
                        <input type="hidden" name="source" value="Partner Inquiry - Home">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@include('partials.site-gallery', ['moreGalleryUrl' => route('gallery')])
<section class="soical-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="900">Keep in Touch</h2>
                <ul>
                    <li data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom"><a href="https://www.facebook.com/careerinstituteofficial" target="_blank" rel="noopener noreferrer" aria-label="Career Institute on Facebook"><img src="assets/images/fb.png" alt="Facebook"></a></li>
                    <li data-aos="fade-up" data-aos-duration="1100" data-aos-anchor-placement="top-bottom"><a href="https://www.instagram.com/careerinstituteofficial" target="_blank" rel="noopener noreferrer" aria-label="Career Institute on Instagram"><img src="assets/images/instagram.png" alt="Instagram"></a></li>
                    <li data-aos="fade-up" data-aos-duration="1200" data-aos-anchor-placement="top-bottom"><a href="https://www.youtube.com/@CareerInstitutepk" target="_blank" rel="noopener noreferrer" aria-label="Career Institute on YouTube"><img src="assets/images/youtube.png" alt="YouTube"></a></li>
                    <li data-aos="fade-up" data-aos-duration="1300" data-aos-anchor-placement="top-bottom"><a href="#"><img src="assets/images/tiktok.png" alt="TikTok"></a></li>
                    <li data-aos="fade-up" data-aos-duration="1400" data-aos-anchor-placement="top-bottom"><a href="https://www.linkedin.com/company/careerinstituteofficial/" target="_blank" rel="noopener noreferrer" aria-label="Career Institute on LinkedIn"><img src="assets/images/linkdin.png" alt="LinkedIn"></a></li>
                    <li data-aos="fade-up" data-aos-duration="1500" data-aos-anchor-placement="top-bottom"><a href="https://twitter.com/careerofficials" target="_blank" rel="noopener noreferrer" aria-label="Career Institute on X"><img src="assets/images/x.png" alt="X"></a></li>
                    <li data-aos="fade-up" data-aos-duration="1600" data-aos-anchor-placement="top-bottom"><a href="https://wa.me/923144444010" target="_blank" rel="noopener noreferrer" aria-label="Chat with Career Institute on WhatsApp"><img src="assets/images/wp.png" alt="WhatsApp"></a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
@include('partials.site-faq-section', ['withAos' => true])
@if(false)
<section class="faq-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3 data-aos="fade-up" data-aos-duration="800" data-aos-anchor-placement="top-bottom">Do You Need Help?</h3>
                <h6 data-aos="fade-up" data-aos-duration="900" data-aos-anchor-placement="top-bottom">Frequently Asked <span>Questions</span></h6>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="faq-bar">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item" data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                What is Lorem Ipsum?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aut, reiciendis maxime voluptates nulla repudiandae ullam maiores quia? Ipsum, illum sit assumenda, esse sequi quia quo blanditiis ratione quidem vero possimus?</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item" data-aos="fade-up" data-aos-duration="1100" data-aos-anchor-placement="top-bottom">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aut, reiciendis maxime voluptates nulla repudiandae ullam maiores quia? Ipsum, illum sit assumenda, esse sequi quia quo blanditiis ratione quidem vero possimus?</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item" data-aos="fade-up" data-aos-duration="1200" data-aos-anchor-placement="top-bottom">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aut, reiciendis maxime voluptates nulla repudiandae ullam maiores quia? Ipsum, illum sit assumenda, esse sequi quia quo blanditiis ratione quidem vero possimus?</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
<section class="letter-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <section class="newsletter" data-aos="zoom-in-up" data-aos-duration="1200" data-aos-anchor-placement="top-bottom">
                    <div class="newsletter__content">
                        <div class="newsletter__text">
                            <h2>Join Our News Letter</h2>
                            <p>
                                Never miss important updates, events, and 
                                career opportunities.
                            </p>
                        </div>
                        <form class="newsletter__form lead-form" method="POST" action="{{ route('subscribers.store') }}">
                            @csrf
                            <input type="text" name="phone" placeholder="Contact No." required>
                            <input type="email" name="email" placeholder="Example@gmail.com" required>
                            <button type="submit" class="join-btn">Join</button>
                            <input type="hidden" name="source" value="Newsletter - Home">
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </div>
</section>
@endsection
@push('scripts')
<style>
    .native-testimonial-slider {
        display: flex;
        gap: 14px;
        overflow-x: auto;
        scroll-behavior: smooth;
        scroll-snap-type: x mandatory;
        scrollbar-width: none;
    }
    .native-testimonial-slider::-webkit-scrollbar { display: none; }
    .native-testimonial-slider > .item {
        flex: 0 0 calc(16.666% - 12px);
        scroll-snap-align: start;
    }
    .testimonial-section { position: relative; }
    .native-testimonial-control {
        position: absolute;
        top: 50%;
        z-index: 2;
        width: 42px;
        height: 42px;
        border: 1px solid #03c587;
        border-radius: 50%;
        background: #fff;
        color: #012e4b;
        font-size: 26px;
        line-height: 1;
    }
    .native-testimonial-prev { left: -18px; }
    .native-testimonial-next { right: -18px; }
    @media (max-width: 991px) {
        .native-testimonial-slider > .item { flex-basis: calc(50% - 7px); }
    }
    @media (max-width: 575px) {
        .native-testimonial-slider > .item { flex-basis: 100%; }
        .native-testimonial-prev { left: 4px; }
        .native-testimonial-next { right: 4px; }
    }
</style>
<script>
    $(document).ready(function() {
    	var $slider = $('.testimonial-slider');
    	$slider.on('init reInit afterChange setPosition breakpoint', function() {
    		setTimeout(setCardClasses, 50);
    	});
    	$slider.slick({
            slidesToShow: 6,
    		slidesToScroll: 1,
    		autoplay: true,
    		autoplaySpeed: 3000,
    		cssEase: 'linear',
		infinite: {{ $alumni->count() > 6 ? 'true' : 'false' }},
		arrows: {{ $alumni->count() > 6 ? 'true' : 'false' }},
    		speed: 900,
    		prevArrow: '<button class="slider-prev"><i class="fa fa-angle-left"></i></button>',
    		nextArrow: '<button class="slider-next"><i class="fa fa-angle-right"></i></button>',
    		responsive: [{
			breakpoint: 1280,
				settings: {
					slidesToShow: 4,
				}
				},
				{
			breakpoint: 992,
				settings: {
					slidesToShow: 2,
					}
				},
				{
			breakpoint: 767,
				settings: {
					slidesToShow: 1,
					}
				},
                {
					breakpoint: 480,
					settings: {
						slidesToShow: 1,
                        centerMode: true,
                        centerPadding: '40px',
					}
				}
    		]
    	});
    	function resetClasses() {
    		$('.testimonial-slider .card-wrap').removeClass(
    			'left-2 left-1 center-1 center-2 right-1 right-2'
    		);
    	}
    	function setCardClasses() {
    		resetClasses();
    		var active = $('.testimonial-slider .slick-active');
    		var total = active.length;
    		if (total == 6) {
    			active.eq(0).find('.card-wrap').addClass('left-2');
    			active.eq(1).find('.card-wrap').addClass('left-1');
    			active.eq(2).find('.card-wrap').addClass('center-1');
    			active.eq(3).find('.card-wrap').addClass('center-2');
    			active.eq(4).find('.card-wrap').addClass('right-1');
    			active.eq(5).find('.card-wrap').addClass('right-2');
    		} else if (total == 4) {
    			active.eq(0).find('.card-wrap').addClass('left-1');
    			active.eq(1).find('.card-wrap').addClass('center-1');
    			active.eq(2).find('.card-wrap').addClass('center-2');
    			active.eq(3).find('.card-wrap').addClass('right-1');
    		} else if (total == 3) {
    			active.eq(0).find('.card-wrap').addClass('left-1');
    			active.eq(1).find('.card-wrap').addClass('center-1');
    			active.eq(2).find('.card-wrap').addClass('right-1');
    		} else if (total == 2) {
    			active.eq(0).find('.card-wrap').addClass('center-1');
    			active.eq(1).find('.card-wrap').addClass('center-2');
    		} else {
    			active.eq(0).find('.card-wrap').addClass('center-1');
    		}
    	}
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var slider = document.querySelector('.testimonial-slider');

        if (!slider || slider.classList.contains('slick-initialized')) {
            return;
        }

        slider.classList.add('native-testimonial-slider');

        if (slider.children.length <= 6) {
            return;
        }

        [
            ['native-testimonial-prev', 'Previous alumni reviews', -1, '\u2039'],
            ['native-testimonial-next', 'Next alumni reviews', 1, '\u203a'],
        ].forEach(function (control) {
            var button = document.createElement('button');
            button.type = 'button';
            button.className = 'native-testimonial-control ' + control[0];
            button.setAttribute('aria-label', control[1]);
            button.textContent = control[3];
            button.addEventListener('click', function () {
                slider.scrollBy({ left: slider.clientWidth * control[2], behavior: 'smooth' });
            });
            slider.parentNode.appendChild(button);
        });
    });
</script>
<script>
    $('button[data-bs-toggle="tab"]').on('shown.bs.tab', function () {
        setTimeout(function () {
            $('.news-slider').each(function () {
                $(this).slick('refresh');
                $(this).slick('setPosition');
            });
        }, 100);
    });
</script>
@endpush
