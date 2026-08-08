@extends('layouts.app')
@section('title', 'Courses & Certifications | Career Website')
@section('body_class', 'courses-page')
@section('content')
<section class="cer-bar">
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
                    <form action="#">
                        <div class="input-group mb-4">
                            <input type="text" class="form-control sc-iput" placeholder="Search courses and certifications that match your goals." aria-describedby="button-addon2">
                            <button class="btn btn-outline-secondary" type="button" id="button-addon2"><img src="{{ asset('assets/images/icon94.svg') }}" alt=""></button>
                        </div>
                    </form>
                </div>
                <div class="cor-slider mb-lg-3">
                    @forelse ($categories as $cat)
                        <div>
                            <div class="text-box">
                                <a href="{{ route('courses-certifications') }}#course-{{ $cat->slug }}">{{ $cat->name }}</a>
                            </div>
                        </div>
                    @empty
                    @endforelse
                </div>
                <div class="btn-area">
                    <ul>
                        <li><a href="#">Explore all Courses</a></li>
                        <li><a href="#">Get Started</a></li>
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
<section class="cor-block">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Explore By Category</h2>
            </div>
            <div class="col-lg-12">
                <ul>
                    <li>
                        <a href="#">
                            <div class="box">
                                <div class="img-hold">
                                    <img src="{{ asset('assets/images/icon97.svg') }}" alt="">
                                </div>
                                <div class="t-hold">
                                    <h4>AI & Data Science</h4>
                                    <p>
                                        AI, Machine Learning, Data Science, Python,
                                        Data Analytics and Automation.
                                    </p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="box">
                                <div class="img-hold">
                                    <img src="{{ asset('assets/images/icon98.svg') }}" alt="">
                                </div>
                                <div class="t-hold">
                                    <h4>Web & Software Development</h4>
                                    <p>
                                        MERN Stack, PHP Laravel, Python Django,
                                        WordPress and Mobile App Development.
                                    </p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="box">
                                <div class="img-hold">
                                    <img src="{{ asset('assets/images/icon99.svg') }}" alt="">
                                </div>
                                <div class="t-hold">
                                    <h4>Digital Marketing & E-Commerce</h4>
                                    <p>
                                        Digital Marketing, SEO, Google Ads,  TikTok,
                                        Meta Ads, Shopify, Amazon and more.
                                    </p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="box">
                                <div class="img-hold">
                                    <img src="{{ asset('assets/images/icon100.svg') }}" alt="">
                                </div>
                                <div class="t-hold">
                                    <h4>Graphics, UI/UX & Creative Media</h4>
                                    <p>
                                        Graphic & UI/UX Designing, Video Editing,
                                        Motion Graphics, Animation and Content Creation.
                                    </p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="box">
                                <div class="img-hold">
                                    <img src="{{ asset('assets/images/icon101.svg') }}" alt="">
                                </div>
                                <div class="t-hold">
                                    <h4>Cybersecurity, Networking & Cloud</h4>
                                    <p>
                                        Cybersecurity, Ethical Hacking, Networking
                                        Administration, Cloud Computing and IT Support.
                                    </p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="box">
                                <div class="img-hold">
                                    <img src="{{ asset('assets/images/icon102.svg') }}" alt="">
                                </div>
                                <div class="t-hold">
                                    <h4>Architecture, Engineering & Design</h4>
                                    <p>
                                        AutoCAD, Revit Architecture, SketchUp,
                                        3D Modelling and Interior Design 
                                    </p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="box">
                                <div class="img-hold">
                                    <img src="{{ asset('assets/images/icon103.svg') }}" alt="">
                                </div>
                                <div class="t-hold">
                                    <h4>Office, Business & Accounting</h4>
                                    <p>
                                        Office Management, Computerized Accounting,
                                        QuickBooks and Business Administration.
                                    </p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="box">
                                <div class="img-hold">
                                    <img src="{{ asset('assets/images/icon104.svg') }}" alt="">
                                </div>
                                <div class="t-hold">
                                    <h4>Language & Test Preparation</h4>
                                    <p>
                                        Spoken English, IELTS, PTE, Business English,
                                        Grammar and Communication Skills.
                                    </p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="box">
                                <div class="img-hold">
                                    <img src="{{ asset('assets/images/icon105.svg') }}" alt="">
                                </div>
                                <div class="t-hold">
                                    <h4>Health, Safety & Compliance</h4>
                                    <p>
                                        NEBOSH, IOSH, OSHA, Workplace Safety,
                                        Fire Safety and HSE
                                    </p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="box">
                                <div class="img-hold">
                                    <img src="{{ asset('assets/images/icon106.svg') }}" alt="">
                                </div>
                                <div class="t-hold">
                                    <h4>Freelancing & Entrepreneurship</h4>
                                    <p>
                                        Freelancing, Personal Branding, Client Acquisition,
                                        Business Development and Startup Skills.
                                    </p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="box">
                                <div class="img-hold">
                                    <img src="{{ asset('assets/images/icon107.svg') }}" alt="">
                                </div>
                                <div class="t-hold">
                                    <h4>International Certifications</h4>
                                    <p>
                                        Cisco, Microsoft, AWS, Autodesk, Oracle, SAP,
                                        PMI, EC-Council and more.
                                    </p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="box">
                                <div class="img-hold">
                                    <img src="{{ asset('assets/images/icon108.svg') }}" alt="">
                                </div>
                                <div class="t-hold">
                                    <h4>Professional & Soft Skills</h4>
                                    <p>
                                        Leadership, Communication, Presentation Skills,
                                        Career Development and Workplace Ethics.
                                    </p>
                                </div>
                            </div>
                        </a>
                    </li>
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
                                    <img src="{{ asset('assets/images/img03.png') }}" alt="{{ $course->title }}">
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
                                            <span><img src="assets/images/icon12.svg" alt=""> {{ $course->duration_weeks ? $course->duration_weeks.' Weeks' : 'Flexible' }}</span>
                                        </li>
                                        <li>
                                            Mode:
                                            <span><img src="assets/images/icon09.svg" alt="">{{ $course->mode->name }}</span>
                                        </li>
                                    </ul>
                                    <div class="btn-area">
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
                                <li><a href="#" class="btn gs-btn">Get Started</a></li>
                                <li><a href="#" class="btn eac-btn">Explore All Courses</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="acc-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>All Courses & Certifications</h2>
                <p>
                    Browse our complete  range of courses and certification. Find the perfect program to achieve your career goals.
                </p>
            </div>
            <div class="col-lg-12">
                <div class="course-listing">
                    <div class="row">
                        <div class="col-xl-3 col-lg-4">
                            <aside class="course-sidebar">
                                <h2 class="sidebar-title">
                                    Search Courses
                                </h2>
                                <!-- Search -->
                                <div class="search-box">
                                    <input type="text" class="form-control" placeholder="Search for Courses">
                                    <button type="button"><i class="fa-solid fa-magnifying-glass"></i>
                                    </button>
                                </div>
                                <!-- Categories -->
                                <div class="filter-box">
                                    <div class="filter-title">
                                        <h4>Categories</h4>
                                        <a href="#">Clear all</a>
                                    </div>
                                    <ul>
                                        <li>
                                            <label>
                                                <input type="checkbox" class="form-check-input">
                                                AI & Data Science
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="checkbox" class="form-check-input">
                                                Digital Marketing & E-Commerce
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="checkbox" class="form-check-input">
                                                Graphics, UI/UX Creative Media
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="checkbox" class="form-check-input">
                                                Architecture, Engineering & Design
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="checkbox" class="form-check-input">
                                                Health, Safety & Professional Compliance
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="checkbox" class="form-check-input">
                                                Web & Software Development
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="checkbox" class="form-check-input">
                                                Cyber Security
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="checkbox" class="form-check-input">
                                                Office, Business & Accounting
                                            </label>
                                        </li>
                                    </ul>
                                </div>

                                <!-- Teaching Method -->

                                <div class="filter-box">
                                    <div class="filter-title">
                                        <h4>Teaching Method</h4>
                                    </div>
                                    <ul>
                                        <li>
                                            <label>
                                                <input type="checkbox" class="form-check-input">
                                                On-Campus
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="checkbox" class="form-check-input">
                                                Online
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="checkbox" class="form-check-input">
                                                Hybrid
                                            </label>
                                        </li>
                                    </ul>
                                </div>

                                <!-- Duration -->

                                <div class="filter-box">
                                    <div class="filter-title">
                                        <h4>Duration</h4>
                                    </div>
                                    <ul>
                                        <li>
                                            <label>
                                                <input type="checkbox" class="form-check-input">
                                                1 - 3 Months
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="checkbox" class="form-check-input">
                                                3 - 6 Months
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="checkbox" class="form-check-input">
                                                6 - 12 Months
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                            </aside>
                        </div>

                        <div class="col-xl-9 col-lg-8">
                            <div class="course-content">
                                <div class="row mb-4">
                                    <div class="col-lg-12">
                                        <div class="course-top-bar">
                                            <h3>
                                                <strong>Showing</strong> {{ $courses->count() }} of {{ $courses->count() }} Courses
                                            </h3>
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
                                                    <img src="{{ asset('assets/images/img03.png') }}" alt="{{ $course->title }}">
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
                                                            <span><img src="assets/images/icon12.svg" alt=""> {{ $course->duration_weeks ? $course->duration_weeks.' Weeks' : 'Flexible' }}</span>
                                                        </li>
                                                        <li>
                                                            Mode:
                                                            <span><img src="assets/images/icon09.svg" alt="">{{ $course->mode->name }}</span>
                                                        </li>
                                                    </ul>
                                                    <!-- Buttons -->

                                                    <div class="course-buttons">
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
                                            <p>No courses published yet. Check back soon.</p>
                                        </div>
                                    @endforelse
                                </div>


                                <!-- Pagination -->

                                <nav class="pagination-wrap mt-3">
                                    <ul class="pagination justify-content-center">
                                        <li class="page-item">
                                            <a class="page-link" href="#">
                                                <i class="fas fa-chevron-left"></i>
                                                Previous
                                            </a>
                                        </li>
                                        <li class="page-item active">
                                            <a class="page-link" href="#">
                                                1
                                            </a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">
                                                2
                                            </a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">
                                                3
                                            </a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">
                                                4
                                            </a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">
                                                5
                                            </a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">
                                                Next
                                               <i class="fas fa-chevron-right"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="info-bar">
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
                                <img src="{{ asset('assets/images/icon20.svg') }}" alt="">
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
                                <img src="{{ asset('assets/images/icon21.svg') }}" alt="">
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
                                <img src="{{ asset('assets/images/icon22.svg') }}" alt="">
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
                                <img src="{{ asset('assets/images/icon136.svg') }}" alt="">
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
                                <img src="{{ asset('assets/images/icon137.svg') }}" alt="">
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
                    <li><a href="#"><img src="{{ asset('assets/images/fb.png') }}" alt=""></a></li>
                    <li><a href="#"><img src="{{ asset('assets/images/instagram.png') }}" alt=""></a></li>
                    <li><a href="#"><img src="{{ asset('assets/images/youtube.png') }}" alt=""></a></li>
                    <li><a href="#"><img src="{{ asset('assets/images/tiktok.png') }}" alt=""></a></li>
                    <li><a href="#"><img src="{{ asset('assets/images/linkdin.png') }}" alt=""></a></li>
                    <li><a href="#"><img src="{{ asset('assets/images/x.png') }}" alt=""></a></li>
                    <li><a href="#"><img src="{{ asset('assets/images/wp.png') }}" alt=""></a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="location-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Our Campuses</h2>
            </div>
        </div>
        <div class="row g-4">
            <!-- Left -->
            <div class="col-lg-6">
                <div class="location-list">
                    <div class="location-card active"
                        data-map="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3808.2315463269783!2d73.117695!3d31.41968!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3922686eab09f4f1%3A0x679e30a285de4fb1!2sCareer%20Institute%20-%20Madina%20Town%20Branch!5e1!3m2!1sen!2s!4v1782547783345!5m2!1sen!2s">
                        <div class="location-icon">
                            <img src="{{ asset('assets/images/icon24.svg') }}" alt="">
                        </div>
                        <div class="location-info">
                            <h5>Career Institute - Madina Town Branch</h5>
                            <p>
                                Career Institute, P-49, Chenab Market, Susan Road, Block Z Madina Town,
                                Faisalabad, 38000, Pakistan
                            </p>
                            <span>
                            0418542950 / 03007662050
                            </span>
                        </div>
                    </div>
                    <div class="location-card"
                        data-map="https://maps.google.com/maps?q=lahore&t=&z=13&ie=UTF8&iwloc=&output=embed">
                        <div class="location-icon">
                            <img src="{{ asset('assets/images/icon24.svg') }}" alt="">
                        </div>
                        <div class="location-info">
                            <h5>Career Institute - Madina Town Branch</h5>
                            <p>
                                Career Institute, P-49, Chenab Market, Susan Road, Block Z Madina Town,
                                Faisalabad, 38000, Pakistan
                            </p>
                            <span>
                            0418542950 / 03007662050
                            </span>
                        </div>
                    </div>
                    <div class="location-card"
                        data-map="https://maps.google.com/maps?q=karachi&t=&z=13&ie=UTF8&iwloc=&output=embed">
                        <div class="location-icon">
                            <img src="{{ asset('assets/images/icon24.svg') }}" alt="">
                        </div>
                        <div class="location-info">
                            <h5>Career Institute - Madina Town Branch</h5>
                            <p>
                                Career Institute, P-49, Chenab Market, Susan Road, Block Z Madina Town,
                                Faisalabad, 38000, Pakistan
                            </p>
                            <span>
                            0418542950 / 03007662050
                            </span>
                        </div>
                    </div>
                    <div class="location-card"
                        data-map="https://maps.google.com/maps?q=karachi&t=&z=13&ie=UTF8&iwloc=&output=embed">
                        <div class="location-icon">
                            <img src="{{ asset('assets/images/icon24.svg') }}" alt="">
                        </div>
                        <div class="location-info">
                            <h5>Career Institute - Madina Town Branch</h5>
                            <p>
                                Career Institute, P-49, Chenab Market, Susan Road, Block Z Madina Town,
                                Faisalabad, 38000, Pakistan
                            </p>
                            <span>
                            0418542950 / 03007662050
                            </span>
                        </div>
                    </div>
                    <div class="location-card"
                        data-map="https://maps.google.com/maps?q=karachi&t=&z=13&ie=UTF8&iwloc=&output=embed">
                        <div class="location-icon">
                            <img src="{{ asset('assets/images/icon24.svg') }}" alt="">
                        </div>
                        <div class="location-info">
                            <h5>Career Institute - Madina Town Branch</h5>
                            <p>
                                Career Institute, P-49, Chenab Market, Susan Road, Block Z Madina Town,
                                Faisalabad, 38000, Pakistan
                            </p>
                            <span>
                            0418542950 / 03007662050
                            </span>
                        </div>
                    </div>
                    <div class="location-card"
                        data-map="https://maps.google.com/maps?q=karachi&t=&z=13&ie=UTF8&iwloc=&output=embed">
                        <div class="location-icon">
                            <img src="{{ asset('assets/images/icon24.svg') }}" alt="">
                        </div>
                        <div class="location-info">
                            <h5>Career Institute - Madina Town Branch</h5>
                            <p>
                                Career Institute, P-49, Chenab Market, Susan Road, Block Z Madina Town,
                                Faisalabad, 38000, Pakistan
                            </p>
                            <span>
                            0418542950 / 03007662050
                            </span>
                        </div>
                    </div>
                    <!-- Aur locations yahan add kar sakte hain -->
                </div>
            </div>
            <!-- Right -->
            <div class="col-lg-6">
                <div class="map-wrapper">
                    <iframe
                        id="locationMap"
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3808.2315463269783!2d73.117695!3d31.41968!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3922686eab09f4f1%3A0x679e30a285de4fb1!2sCareer%20Institute%20-%20Madina%20Town%20Branch!5e1!3m2!1sen!2s!4v1782547783345!5m2!1sen!2s"
                        loading="lazy">
                    </iframe>
                </div>
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
@endpush