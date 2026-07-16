@extends('layouts.app')
@section('title', 'Contact Us | Career Website')
@section('body_class', 'contact-page')
@section('content')
<section class="top-banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="sm-box">
                    <h1>Contact Us</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="info-bar">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="aos-init aos-animate" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1000">
                    Request a Free Career Counseling Session
                </h2>
                <h5 class="aos-init aos-animate" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1100">
                    We offer a complimentary, no-obligation career counseling session to learn about your aspirations and help<br>
                    you map out your path to success.
                </h5>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="row mb-4">
                    <div class="col-lg-3 aos-init aos-animate" data-aos="zoom-in-up" data-aos-duration="1000">
                        <div class="box">
                            <div class="img-hold">
                                <img src="{{ asset('assets/images/icon20.svg') }}" alt="">
                            </div>
                            <div class="t-bar">
                                <h3>Call Us Today</h3>
                                <p>0341-4444010</p>
                                <p>0341-4444010</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 aos-init aos-animate" data-aos="zoom-in-up" data-aos-duration="1100">
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
                    <div class="col-lg-3 aos-init aos-animate" data-aos="zoom-in-up" data-aos-duration="1200">
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
                    <div class="col-lg-3 aos-init aos-animate" data-aos="zoom-in-up" data-aos-duration="1200">
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
                <h2 class="aos-init aos-animate" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="900">Keep in Touch</h2>
                <ul>
                    <li class="aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom"><a href="#"><img src="assets/images/fb.png" alt=""></a></li>
                    <li class="aos-init aos-animate" data-aos="fade-up" data-aos-duration="1100" data-aos-anchor-placement="top-bottom"><a href="#"><img src="assets/images/instagram.png" alt=""></a></li>
                    <li class="aos-init aos-animate" data-aos="fade-up" data-aos-duration="1200" data-aos-anchor-placement="top-bottom"><a href="#"><img src="assets/images/youtube.png" alt=""></a></li>
                    <li class="aos-init aos-animate" data-aos="fade-up" data-aos-duration="1300" data-aos-anchor-placement="top-bottom"><a href="#"><img src="assets/images/tiktok.png" alt=""></a></li>
                    <li class="aos-init aos-animate" data-aos="fade-up" data-aos-duration="1400" data-aos-anchor-placement="top-bottom"><a href="#"><img src="assets/images/linkdin.png" alt=""></a></li>
                    <li class="aos-init aos-animate" data-aos="fade-up" data-aos-duration="1500" data-aos-anchor-placement="top-bottom"><a href="#"><img src="assets/images/x.png" alt=""></a></li>
                    <li class="aos-init aos-animate" data-aos="fade-up" data-aos-duration="1600" data-aos-anchor-placement="top-bottom"><a href="#"><img src="assets/images/wp.png" alt=""></a></li>
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
                    <div class="location-card active" data-map="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3808.2315463269783!2d73.117695!3d31.41968!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3922686eab09f4f1%3A0x679e30a285de4fb1!2sCareer%20Institute%20-%20Madina%20Town%20Branch!5e1!3m2!1sen!2s!4v1782547783345!5m2!1sen!2s">
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
                    <div class="location-card" data-map="https://maps.google.com/maps?q=lahore&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed">
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
                    <div class="location-card" data-map="https://maps.google.com/maps?q=karachi&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed">
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
                    <div class="location-card" data-map="https://maps.google.com/maps?q=karachi&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed">
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
                    <div class="location-card" data-map="https://maps.google.com/maps?q=karachi&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed">
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
                    <div class="location-card" data-map="https://maps.google.com/maps?q=karachi&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed">
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
                    <iframe id="locationMap" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3808.2315463269783!2d73.117695!3d31.41968!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3922686eab09f4f1%3A0x679e30a285de4fb1!2sCareer%20Institute%20-%20Madina%20Town%20Branch!5e1!3m2!1sen!2s!4v1782547783345!5m2!1sen!2s" loading="lazy">
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
@endpush