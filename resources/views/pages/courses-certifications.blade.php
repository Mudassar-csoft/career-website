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
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="form-block">
                        <form action="#">
                            <div class="input-group mb-4">
                                <input type="text" class="form-control sc-iput" placeholder="Search courses and certifications that match your goals." aria-label="Recipient's username" aria-describedby="button-addon2">
                                <button class="btn btn-outline-secondary" type="button" id="button-addon2"><img src="{{ asset('assets/images/icon94.svg') }}" alt=""></button>
                            </div>
                        </form>
                    </div>
                    <div class="cor-slider mb-4">
                        <div>
                            <div class="text-box">
                                <a href="#">IELTS </a>
                            </div>
                        </div>
                        <div>
                            <div class="text-box">
                                <a href="#">UI/UX Designing</a>
                            </div>
                        </div>
                        <div>
                            <div class="text-box">
                                <a href="#">Digital Marketing & SEO</a>
                            </div>
                        </div>
                        <div>
                            <div class="text-box">
                                <a href="#">AI & Data Science</a>
                            </div>
                        </div>
                        <div>
                            <div class="text-box">
                                <a href="#">IELTS </a>
                            </div>
                        </div>
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
                <ul class="mb-3">
                    <li>
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
                    </li>
                    <li>
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
                    </li>
                    <li>
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
                    </li>
                    <li>
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
                    </li>
                </ul>
                <ul class="mb-3">
                    <li>
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
                    </li>
                    <li>
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
                    </li>
                    <li>
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
                    </li>
                    <li>
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
                    </li>
                </ul>

                <ul>
                    <li>
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
                    </li>
                    <li>
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
                    </li>
                    <li>
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
                    </li>
                    <li>
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
                    </li>
                </ul>
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
                    We offer a complimentary, no-obligation career counseling session to learn about your aspirations and help<br>
                    you map out your path to success.
                </h5>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="row mb-4">
                    <div class="col-lg-3">
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
                    </div>
                    <div class="col-lg-3">
                        <div class="box">
                            <div class="img-hold">
                                <img src="{{ asset('assets/images/icon21.svg') }}" alt="">
                            </div>
                            <div class="t-bar">
                                <h3>Email</h3>
                                <p>info@career.edu.pk</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="box">
                            <div class="img-hold">
                                <img src="{{ asset('assets/images/icon22.svg') }}" alt="">
                            </div>
                            <div class="t-bar">
                                <h3>Webex Meetings</h3>
                                <p>Career.pk</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="box">
                            <div class="img-hold">
                                <img src="{{ asset('assets/images/icon23.svg') }}" alt="">
                            </div>
                            <div class="t-bar">
                                <h3>Office Hours</h3>
                                <p>Mon- Sat</p>
                                <p>10:00am-7:00pm</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-block">
                    <form class="row g-3">
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Name">
                        </div>
                        <div class="col-md-6">
                            <input type="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Subject">
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Phone no">
                        </div>
                        <div class="col-md-12">
                            <textarea placeholder="Message" class="form-control" rows="9"></textarea>
                        </div>
                        <div class="col-12 text-center mt-4">
                            <button type="submit" class="btn sm-btn">Send Message</button>
                        </div>
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
            autoplaySpeed: 0,
            speed: 3500,
            cssEase: "linear",
            arrows: true,
            pauseOnHover: true,
            infinite: true,
        });
    }
</script>
@endpush