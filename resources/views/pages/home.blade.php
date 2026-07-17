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
                    Complete the form below and our career advisors will contact you shortly.<br>
                    You'll also receive updates on courses, admissions, scholarships, events,<br>
                    and career opportunities through our newsletter.
                </p>
                <div class="form-block">
                    <form class="row g-3">
                        <div class="col-12 col-sm-6">
                            <input type="text" class="form-control" placeholder="Full Name">
                        </div>
                        <div class="col-12 col-sm-6">
                            <input type="text" class="form-control" placeholder="Course">
                        </div>
                        <div class="col-12 col-sm-6">
                            <input type="text" class="form-control" placeholder="Contact">
                        </div>
                        <div class="col-12 col-sm-6">
                            <input type="email" class="form-control" placeholder="example@gmail.com">
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
                                Subscribe to newsletter
                                </label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn apply-btn">Apply Now</button>
                        </div>
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
                        <img src="assets/images/img15.png" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="counter-box">
                    <div class="counter-item">
                        <div class="icon">
                            <img src="assets/images/icon01.svg" alt="">
                        </div>
                        <h2 class="counter" data-target="150000">0</h2>
                        <p>Alumni</p>
                    </div>
                    <div class="counter-item">
                        <div class="icon">
                            <img src="assets/images/icon02.svg" alt="">
                        </div>
                        <h2 class="counter" data-target="50">0</h2>
                        <p>Affiliations</p>
                    </div>
                    <div class="counter-item">
                        <div class="icon">
                            <img src="assets/images/icon03.svg" alt="">
                        </div>
                        <h2 class="counter" data-target="100">0</h2>
                        <p>Trainings</p>
                    </div>
                    <div class="counter-item">
                        <div class="icon">
                            <img src="assets/images/icon04.svg" alt="">
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
                                <div class="news-bar aos-init aos-animate" data-aos="fade-up" data-aos-anchor-placement="top-center" data-aos-duration="1000">
                                    <div class="news-slider">
                                        <div>
                                            <div class="box s-blue">
                                                <p>
                                                    Career Institute Signs Franchise MOU for
                                                    Kohinoor FSD  Branch<a href="#">Read more...</a>
                                                </p>
                                                <div class="d-bar">
                                                    <img src="assets/images/icon05.svg" alt=""> 
                                                    <span>09-12-2024</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="box s-black">
                                                <p>
                                                    Career Institute Signs Franchise MOU for
                                                    Kohinoor FSD  Branch<a href="#">Read more...</a>
                                                </p>
                                                <div class="d-bar">
                                                    <img src="assets/images/icon05.svg" alt=""> 
                                                    <span>09-12-2024</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="box s-green">
                                                <p>
                                                    Career Institute Signs Franchise MOU for
                                                    Kohinoor FSD  Branch<a href="#">Read more...</a>
                                                </p>
                                                <div class="d-bar">
                                                    <img src="assets/images/icon05.svg" alt=""> 
                                                    <span>09-12-2024</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="box s-black">
                                                <p>
                                                    Career Institute Signs Franchise MOU for
                                                    Kohinoor FSD  Branch<a href="#">Read more...</a>
                                                </p>
                                                <div class="d-bar">
                                                    <img src="assets/images/icon05.svg" alt=""> 
                                                    <span>09-12-2024</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="#" class="btn r-btn">Read More</a>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                                <div class="event-bar aos-init aos-animate" data-aos="fade-up" data-aos-anchor-placement="top-center" data-aos-duration="1200">
                                    <ul>
                                        <li>
                                            <div class="d-info">
                                                <h3>
                                                    27 <span>Apr</span>
                                                </h3>
                                            </div>
                                            <div class="t-bar">
                                                <p>
                                                    Inauguration Career Institute
                                                    Lahore Wapda Town Branch
                                                </p>
                                                <span><i class="fas fa-map-marker-alt"></i> Lahore</span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="d-info">
                                                <h3>
                                                    27 <span>Apr</span>
                                                </h3>
                                            </div>
                                            <div class="t-bar">
                                                <p>
                                                    Inauguration Career Institute
                                                    Lahore Wapda Town Branch
                                                </p>
                                                <span><i class="fas fa-map-marker-alt"></i> Lahore</span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="d-info">
                                                <h3>
                                                    27 <span>Apr</span>
                                                </h3>
                                            </div>
                                            <div class="t-bar">
                                                <p>
                                                    Inauguration Career Institute
                                                    Lahore Wapda Town Branch
                                                </p>
                                                <span><i class="fas fa-map-marker-alt"></i> Lahore</span>
                                            </div>
                                        </li>
                                    </ul>
                                    <a href="#" class="btn event-btn">All Events</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-4 mb-lg-0 d-none d-md-flex">
                    <div class="col-md-6">
                        <div class="news-bar aos-init aos-animate" data-aos="fade-up" data-aos-anchor-placement="top-center" data-aos-duration="1000">
                            <h2>News</h2>
                            <div class="news-slider">
                                <div>
                                    <div class="box s-blue">
                                        <p>
                                            Career Institute Signs Franchise MOU for
                                            Kohinoor FSD  Branch<a href="#">Read more...</a>
                                        </p>
                                        <div class="d-bar">
                                            <img src="assets/images/icon05.svg" alt=""> 
                                            <span>09-12-2024</span>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="box s-black">
                                        <p>
                                            Career Institute Signs Franchise MOU for
                                            Kohinoor FSD  Branch<a href="#">Read more...</a>
                                        </p>
                                        <div class="d-bar">
                                            <img src="assets/images/icon05.svg" alt=""> 
                                            <span>09-12-2024</span>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="box s-green">
                                        <p>
                                            Career Institute Signs Franchise MOU for
                                            Kohinoor FSD  Branch<a href="#">Read more...</a>
                                        </p>
                                        <div class="d-bar">
                                            <img src="assets/images/icon05.svg" alt=""> 
                                            <span>09-12-2024</span>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="box s-black">
                                        <p>
                                            Career Institute Signs Franchise MOU for
                                            Kohinoor FSD  Branch<a href="#">Read more...</a>
                                        </p>
                                        <div class="d-bar">
                                            <img src="assets/images/icon05.svg" alt=""> 
                                            <span>09-12-2024</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="#" class="btn r-btn">Read More</a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="event-bar aos-init aos-animate" data-aos="fade-up" data-aos-anchor-placement="top-center" data-aos-duration="1200">
                            <h2>Events</h2>
                            <ul>
                                <li>
                                    <div class="d-info">
                                        <h3>
                                            27 <span>Apr</span>
                                        </h3>
                                    </div>
                                    <div class="t-bar">
                                        <p>
                                            Inauguration Career Institute
                                            Lahore Wapda Town Branch
                                        </p>
                                        <span><i class="fas fa-map-marker-alt"></i> Lahore</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-info">
                                        <h3>
                                            27 <span>Apr</span>
                                        </h3>
                                    </div>
                                    <div class="t-bar">
                                        <p>
                                            Inauguration Career Institute
                                            Lahore Wapda Town Branch
                                        </p>
                                        <span><i class="fas fa-map-marker-alt"></i> Lahore</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-info">
                                        <h3>
                                            27 <span>Apr</span>
                                        </h3>
                                    </div>
                                    <div class="t-bar">
                                        <p>
                                            Inauguration Career Institute
                                            Lahore Wapda Town Branch
                                        </p>
                                        <span><i class="fas fa-map-marker-alt"></i> Lahore</span>
                                    </div>
                                </li>
                            </ul>
                            <a href="#" class="btn event-btn">All Events</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="about-bar aos-init aos-animate" data-aos="fade-up" data-aos-anchor-placement="top-center" data-aos-duration="1500">
                    <h2><span>Why</span> Choose Us</h2>
                    <div class="img-hold">
                        <img src="assets/images/img01.png" alt="">
                    </div>
                    <h3>About Career Institute</h3>
                    <p>
                        Since 2010, Career Institute, a global tech training
                        leader, has impacted 150,000+ students worldwide.
                        Our commitment to industry trends is seen in our
                        current curriculum and certified trainers. Beyond
                        training, we offer coworking spaces to tech startups,
                        fostering professional excellence. Elevate your skills
                        and business at Career Institute – where innovation
                        meets education
                    </p>
                    <a href="#" class="btn r-btn">Read More</a>
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
                    <h2 class="aos-init aos-animate" data-aos="fade-up" data-aos-anchor-placement="top-center" data-aos-duration="1000">Guiding Vision from Our Directors</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 border-lg-end mb-4 mb-lg-0">
                    <div class="t-detail">
                        <div class="img-hold aos-init aos-animate" data-aos="zoom-out-down" data-aos-duration="1000">
                            <img src="assets/images/img02.png" alt="">
                        </div>
                        <span class="aos-init aos-animate" data-aos="zoom-out-up" data-aos-duration="800">Adeel Javaid - Founder & CEO</span>
                        <p class="aos-init aos-animate" data-aos="zoom-out-down" data-aos-duration="1100">
                            <b>Our mission</b> is to educate and empower enterprise<br>
                            leaders. We firmly believe that the leaders nurtured<br>
                            by our institute play a crucial role in effecting<br>
                            positive change within their organizations and<br>
                            on a global scale.
                        </p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="t-detail">
                        <div class="img-hold aos-init aos-animate" data-aos="zoom-out-down" data-aos-duration="1000">
                            <img src="assets/images/img02.png" alt="">
                        </div>
                        <span class="aos-init aos-animate" data-aos="zoom-out-up" data-aos-duration="800">Adeel Javaid - Founder & CEO</span>
                        <p class="aos-init aos-animate" data-aos="zoom-out-down" data-aos-duration="1100">
                            <b>Our mission</b> is to educate and empower enterprise<br>
                            leaders. We firmly believe that the leaders nurtured<br>
                            by our institute play a crucial role in effecting<br>
                            positive change within their organizations and<br>
                            on a global scale.
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
                <h2 class="aos-init aos-animate" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1000">Featured Courses</h2>
                <p class="aos-init aos-animate" data-aos="fade-down" data-aos-anchor-placement="top-bottom" data-aos-duration="1100">
                    Elevate Your Skills and Land Your Dream Job - Whether you prefer the convenience of learning from home or the<br>
                    advantages of direct sessions on campus with our expert instructors, we've got you covered!
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="feature-slider">
                    <div>
                        <div class="box">
                            <div class="img-hold">
                                <img src="assets/images/img03.png" alt="">
                                <div class="offer-bar">
                                    <h3>30%</h3>
                                    <span>Discount</span>
                                </div>
                            </div>
                            <div class="text-hold">
                                <h3>Digital Marketing</h3>
                                <ul>
                                    <li>
                                        Category: 
                                        <span>Ecommerce</span>
                                    </li>
                                    <li>
                                        Duration: 
                                        <span><img src="assets/images/icon12.svg" alt=""> 3 Months</span>
                                    </li>
                                    <li>
                                        Mode: 
                                        <span> <img src="assets/images/icon09.svg" alt="">Campus</span> 
                                        <span><img src="assets/images/icon10.svg" alt="">Online</span> 
                                        <span><img src="assets/images/icon11.svg" alt="">Hybrid</span>
                                    </li>
                                </ul>
                                <div class="btn-area">
                                    <a href="#" class="btn an-btn">Apply Now</a>
                                    <a href="#" class="btn md-btn">More Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="box">
                            <div class="img-hold">
                                <img src="assets/images/img03.png" alt="">
                                <div class="offer-bar">
                                    <h3>30%</h3>
                                    <span>Discount</span>
                                </div>
                            </div>
                            <div class="text-hold">
                                <h3>Digital Marketing</h3>
                                <ul>
                                    <li>
                                        Category: 
                                        <span>Ecommerce</span>
                                    </li>
                                    <li>
                                        Duration: 
                                        <span><img src="assets/images/icon12.svg" alt=""> 3 Months</span>
                                    </li>
                                    <li>
                                        Mode: 
                                        <span> <img src="assets/images/icon09.svg" alt="">Campus</span> 
                                        <span><img src="assets/images/icon10.svg" alt="">Online</span> 
                                        <span><img src="assets/images/icon11.svg" alt="">Hybrid</span>
                                    </li>
                                </ul>
                                <div class="btn-area">
                                    <a href="#" class="btn an-btn">Apply Now</a>
                                    <a href="#" class="btn md-btn">More Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="box">
                            <div class="img-hold">
                                <img src="assets/images/img03.png" alt="">
                                <div class="offer-bar">
                                    <h3>30%</h3>
                                    <span>Discount</span>
                                </div>
                            </div>
                            <div class="text-hold">
                                <h3>Digital Marketing</h3>
                                <ul>
                                    <li>
                                        Category: 
                                        <span>Ecommerce</span>
                                    </li>
                                    <li>
                                        Duration: 
                                        <span><img src="assets/images/icon12.svg" alt=""> 3 Months</span>
                                    </li>
                                    <li>
                                        Mode: 
                                        <span> <img src="assets/images/icon09.svg" alt="">Campus</span> 
                                        <span><img src="assets/images/icon10.svg" alt="">Online</span> 
                                        <span><img src="assets/images/icon11.svg" alt="">Hybrid</span>
                                    </li>
                                </ul>
                                <div class="btn-area">
                                    <a href="#" class="btn an-btn">Apply Now</a>
                                    <a href="#" class="btn md-btn">More Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="box">
                            <div class="img-hold">
                                <img src="assets/images/img03.png" alt="">
                                <div class="offer-bar">
                                    <h3>30%</h3>
                                    <span>Discount</span>
                                </div>
                            </div>
                            <div class="text-hold">
                                <h3>Digital Marketing</h3>
                                <ul>
                                    <li>
                                        Category: 
                                        <span>Ecommerce</span>
                                    </li>
                                    <li>
                                        Duration: 
                                        <span><img src="assets/images/icon12.svg" alt=""> 3 Months</span>
                                    </li>
                                    <li>
                                        Mode: 
                                        <span> <img src="assets/images/icon09.svg" alt="">Campus</span> 
                                        <span><img src="assets/images/icon10.svg" alt="">Online</span> 
                                        <span><img src="assets/images/icon11.svg" alt="">Hybrid</span>
                                    </li>
                                </ul>
                                <div class="btn-area">
                                    <a href="#" class="btn an-btn">Apply Now</a>
                                    <a href="#" class="btn md-btn">More Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="box">
                            <div class="img-hold">
                                <img src="assets/images/img03.png" alt="">
                                <div class="offer-bar">
                                    <h3>30%</h3>
                                    <span>Discount</span>
                                </div>
                            </div>
                            <div class="text-hold">
                                <h3>Digital Marketing</h3>
                                <ul>
                                    <li>
                                        Category: 
                                        <span>Ecommerce</span>
                                    </li>
                                    <li>
                                        Duration: 
                                        <span><img src="assets/images/icon12.svg" alt=""> 3 Months</span>
                                    </li>
                                    <li>
                                        Mode: 
                                        <span> <img src="assets/images/icon09.svg" alt="">Campus</span> 
                                        <span><img src="assets/images/icon10.svg" alt="">Online</span> 
                                        <span><img src="assets/images/icon11.svg" alt="">Hybrid</span>
                                    </li>
                                </ul>
                                <div class="btn-area">
                                    <a href="#" class="btn an-btn">Apply Now</a>
                                    <a href="#" class="btn md-btn">More Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="video-block">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="aos-init aos-animate" data-aos="zoom-in" data-aos-duration="1000">Explore our campuses through an immersive virtual tour</h2>
                <p class="aos-init aos-animate" data-aos="zoom-in" data-aos-duration="1200">
                    Discover the allure of our stunning campuses in this captivating video tour,where you can truly immerse yourself in the vibrant<br>
                    atmosphere that characterizes our esteemed institution. We extend a warm invitation for you to virtually experience our campus,<br>
                    offering you a glimpse into what sets our educational and personal growth environment apart as something truly exceptional.
                </p>
                <a href="#" class="btn ep-btn mb-5">Explore Campuses</a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <!-- Slide 1 -->
                        <div class="swiper-slide">
                            <div class="video-card">
                                <img src="assets/images/img04.png" alt="">
                                <button class="play-btn" data-video="../assets/video/Web_Header.mp4">
                                <img src="assets/images/ply-btn.png" alt="">
                                </button>
                            </div>
                        </div>
                        <!-- Slide 2 -->
                        <div class="swiper-slide">
                            <div class="video-card">
                                <img src="assets/images/img04.png" alt="">
                                <button class="play-btn" data-video="video2.mp4">
                                <img src="assets/images/ply-btn.png" alt="">
                                </button>
                            </div>
                        </div>
                        <!-- Slide 3 -->
                        <div class="swiper-slide">
                            <div class="video-card">
                                <img src="assets/images/img04.png" alt="">
                                <button class="play-btn" data-video="video3.mp4">
                                <img src="assets/images/ply-btn.png" alt="">
                                </button>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="video-card">
                                <img src="assets/images/img04.png" alt="">
                                <button class="play-btn" data-video="video3.mp4">
                                <img src="assets/images/ply-btn.png" alt="">
                                </button>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="video-card">
                                <img src="assets/images/img04.png" alt="">
                                <button class="play-btn" data-video="video3.mp4">
                                <img src="assets/images/ply-btn.png" alt="">
                                </button>
                            </div>
                        </div>
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
                <h2 class="aos-init aos-animate" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800">
                    What Our Alumni Say
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="testimonial-section">
                    <div class="testimonial-slider">
                        <!-- Slide -->
                        <div class="item">
                            <div class="card-wrap">
                                <div class="box">
                                    <div class="img-hold">
                                        <img src="assets/images/img05.png" alt="">
                                    </div>
                                    <div class="rt-bar">
                                        <h3>Muhammad Talha</h3>
                                        <span>Graphic Designer</span>
                                        <h5>Review</h5>
                                        <p>
                                            Great institute with supportive trainers and
                                            easy-to-understand concepts. Really helped me
                                            improve my IT skills.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Slide -->
                        <div class="item">
                            <div class="card-wrap">
                                <div class="box">
                                    <div class="img-hold">
                                        <img src="assets/images/img06.png" alt="">
                                    </div>
                                    <div class="rt-bar">
                                        <h3>Fatima Maqsood</h3>
                                        <span>Graphic Designer</span>
                                        <h5>Review</h5>
                                        <p>
                                            I loved the practical learning approach.
                                            The courses are well structured and useful
                                            for real-world projects.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Slide -->
                        <div class="item">
                            <div class="card-wrap">
                                <div class="box">
                                    <div class="img-hold">
                                        <img src="assets/images/img07.png" alt="">
                                    </div>
                                    <div class="rt-bar">
                                        <h3>Umar Ishfaq</h3>
                                        <span>Web Developer</span>
                                        <h5>Review</h5>
                                        <p>
                                            Very professional environment with friendly
                                            teachers. I gained confidence and learned
                                            a lot here.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Slide -->
                        <div class="item">
                            <div class="card-wrap">
                                <div class="box">
                                    <div class="img-hold">
                                        <img src="assets/images/img08.png" alt="">
                                    </div>
                                    <div class="rt-bar">
                                        <h3>Asad Riaz</h3>
                                        <span>Digital Marketing</span>
                                        <h5>Review</h5>
                                        <p>
                                            One of the best places to start a career in IT.
                                            Highly recommended for beginners and professionals.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Slide -->
                        <div class="item">
                            <div class="card-wrap">
                                <div class="box">
                                    <div class="img-hold">
                                        <img src="assets/images/img41.png" alt="">
                                    </div>
                                    <div class="rt-bar">
                                        <h3>Ayan Ali</h3>
                                        <span>Graphic Designer</span>
                                        <h5>Review</h5>
                                        <p>
                                            Great institute with best trainers and
                                            easy-to-understand concepts. Really helped
                                            me improve my IT skills.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Slide -->
                        <div class="item">
                            <div class="card-wrap">
                                <div class="box">
                                    <div class="img-hold">
                                        <img src="assets/images/img42.png" alt="">
                                    </div>
                                    <div class="rt-bar">
                                        <h3>Haroon Rashid</h3>
                                        <span>Graphic Designer</span>
                                        <h5>Review</h5>
                                        <p>
                                            Great institute with best trainers and
                                            easy-to-understand concepts. Really helped
                                            me improve my IT skills.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="card-wrap">
                                <div class="box">
                                    <div class="img-hold">
                                        <img src="assets/images/img05.png" alt="">
                                    </div>
                                    <div class="rt-bar">
                                        <h3>Muhammad Talha</h3>
                                        <span>Graphic Designer</span>
                                        <h5>Review</h5>
                                        <p>
                                            Great institute with supportive trainers and
                                            easy-to-understand concepts. Really helped me
                                            improve my IT skills.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                <h2 class="aos-init aos-animate" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800">Collaborations with leading Organizations</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="logo-slider">
                    <div>
                        <div class="img-hold">
                            <img src="assets/images/img09.png" alt="">
                        </div>
                    </div>
                    <div>
                        <div class="img-hold">
                            <img src="assets/images/img10.png" alt="">
                        </div>
                    </div>
                    <div>
                        <div class="img-hold">
                            <img src="assets/images/img11.png" alt="">
                        </div>
                    </div>
                    <div>
                        <div class="img-hold">
                            <img src="assets/images/img12.png" alt="">
                        </div>
                    </div>
                    <div>
                        <div class="img-hold">
                            <img src="assets/images/img10.png" alt="">
                        </div>
                    </div>
                    <div>
                        <div class="img-hold">
                            <img src="assets/images/img11.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="blog-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="aos-init aos-animate" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="900">Latest Blogs</h2>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-lg-3 col-sm-6 mb-4 mb-lg-0 aos-init aos-animate" data-aos="flip-left" data-aos-duration="1000">
                <div class="block">
                    <div class="img-hold">
                        <img src="assets/images/img13.png" alt="">
                    </div>
                    <div class="t-bar">
                        <h3>
                            Shorthand Stenography Skills,
                            Career, Pros and Cons, FAQs.
                        </h3>
                        <p>
                            Shorthand Stenography is such […]
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 mb-4 mb-lg-0 aos-init aos-animate" data-aos="flip-right" data-aos-duration="1100">
                <div class="block">
                    <div class="img-hold">
                        <img src="assets/images/img13.png" alt="">
                    </div>
                    <div class="t-bar">
                        <h3>
                            Shorthand Stenography Skills,
                            Career, Pros and Cons, FAQs.
                        </h3>
                        <p>
                            Shorthand Stenography is such […]
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 mb-4 mb-lg-0 aos-init aos-animate" data-aos="flip-left" data-aos-duration="1200">
                <div class="block">
                    <div class="img-hold">
                        <img src="assets/images/img13.png" alt="">
                    </div>
                    <div class="t-bar">
                        <h3>
                            Shorthand Stenography Skills,
                            Career, Pros and Cons, FAQs.
                        </h3>
                        <p>
                            Shorthand Stenography is such […]
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 mb-4 mb-lg-0 aos-init aos-animate" data-aos="flip-right" data-aos-duration="1300">
                <div class="block">
                    <div class="img-hold">
                        <img src="assets/images/img13.png" alt="">
                    </div>
                    <div class="t-bar">
                        <h3>
                            Shorthand Stenography Skills,
                            Career, Pros and Cons, FAQs.
                        </h3>
                        <p>
                            Shorthand Stenography is such […]
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 aos-init aos-animate" aos-init aos-animate" data-aos="fade-up" data-aos-duration="1400">
                <div class="btn-box">
                    <a href="#" class="btn rm-btn">Read More</a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="partner-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 aos-init aos-animate" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1000">
                <h2>
                    Become a Partner
                </h2>
            </div>
            <div class="col-lg-12">
                <div class="form-block">
                    <form class="row g-4">
                        <div class="col-sm-6 aos-init aos-animate" data-aos="fade-up" data-aos-duration="800">
                            <input type="text" class="form-control" placeholder="Full Name">
                        </div>
                        <div class="col-sm-6 aos-init aos-animate" data-aos="fade-up" data-aos-duration="900">
                            <input type="text" class="form-control" placeholder="Contact no">
                        </div>
                        <div class="col-sm-6 aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">
                            <input type="email" class="form-control" placeholder="Email Address">
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
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="gallery-bar">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 aos-init aos-animate" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="900">
                <h2>Gallery</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-12 col-xl-10">
                <div class="gallery-section">
                    <ul class="gallery-tabs">
                        <li class="active aos-init aos-animate" data-tab="coworking" data-aos="fade-up" data-aos-duration="600">Coworking Space</li>
                        <li data-tab="campus" data-aos="fade-up" data-aos-duration="700" class="aos-init aos-animate">Campuses</li>
                        <li data-tab="tour" data-aos="fade-up" data-aos-duration="800" class="aos-init aos-animate">Tour</li>
                        <li data-tab="expo" data-aos="fade-up" data-aos-duration="900" class="aos-init aos-animate">Expo</li>
                        <li data-tab="navttc" data-aos="fade-up" data-aos-duration="1000" class="aos-init aos-animate">Navttc</li>
                        <li data-tab="certificate" data-aos="fade-up" data-aos-duration="1100" class="aos-init aos-animate">Certificate Distribution</li>
                        <li data-tab="event" data-aos="fade-up" data-aos-duration="1200" class="aos-init aos-animate">Events</li>
                    </ul>
                    <!-- Gallery Content -->
                    <div class="gallery-content">
                        <!-- Coworking -->
                        <div class="gallery-panel active" id="coworking">
                            <div class="gallery-item aos-init aos-animate" data-aos="flip-left" data-aos-duration="900">
                                <img src="assets/images/img14.png">
                                <div class="detial">
                                    <h3>Coworking Space</h3>
                                    <button class="view-btn" data-gallery="coworking" data-index="0">
                                    <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="gallery-item aos-init aos-animate" data-aos="flip-right" data-aos-duration="1000">
                                <img src="assets/images/img14.png">
                                <div class="detial">
                                    <h3>Coworking Space</h3>
                                    <button class="view-btn" data-gallery="coworking" data-index="0">
                                    <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="gallery-item aos-init aos-animate" data-aos="flip-left" data-aos-duration="1100">
                                <img src="assets/images/img14.png">
                                <div class="detial">
                                    <h3>Coworking Space</h3>
                                    <button class="view-btn" data-gallery="coworking" data-index="0">
                                    <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="gallery-item aos-init aos-animate" data-aos="flip-left" data-aos-duration="1200">
                                <img src="assets/images/img14.png">
                                <div class="detial">
                                    <h3>Coworking Space</h3>
                                    <button class="view-btn" data-gallery="coworking" data-index="0">
                                    <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="gallery-item aos-init aos-animate" data-aos="flip-left" data-aos-duration="1300">
                                <img src="assets/images/img14.png">
                                <div class="detial">
                                    <h3>Coworking Space</h3>
                                    <button class="view-btn" data-gallery="coworking" data-index="0">
                                    <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="gallery-item aos-init aos-animate" data-aos="flip-left" data-aos-duration="1400">
                                <img src="assets/images/img14.png">
                                <div class="detial">
                                    <h3>Coworking Space</h3>
                                    <button class="view-btn" data-gallery="coworking" data-index="0">
                                    <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="gallery-item aos-init aos-animate" data-aos="flip-left" data-aos-duration="1500">
                                <img src="assets/images/img14.png">
                                <div class="detial">
                                    <h3>Coworking Space</h3>
                                    <button class="view-btn" data-gallery="coworking" data-index="0">
                                    <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="gallery-item aos-init aos-animate" data-aos="flip-left" data-aos-duration="1600">
                                <img src="assets/images/img14.png">
                                <div class="detial">
                                    <h3>Coworking Space</h3>
                                    <button class="view-btn" data-gallery="coworking" data-index="0">
                                    <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- Campus -->
                        <div class="gallery-panel aos-init aos-animate" id="campus" data-aos="flip-left" data-aos-duration="1700">
                            <div class="gallery-item">
                                <img src="assets/images/img14.png">
                                <div class="detial">
                                    <h3>Coworking Space</h3>
                                    <button class="view-btn" data-gallery="coworking" data-index="0">
                                    <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="btn-area">
                    <a href="#" class="btn more-btn">More Gallery</a>
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
<section class="faq-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="aos-init aos-animate" data-aos="fade-up" data-aos-duration="800" data-aos-anchor-placement="top-bottom">Do You Need Help?</h3>
                <h6 class="aos-init aos-animate" data-aos="fade-up" data-aos-duration="900" data-aos-anchor-placement="top-bottom">Frequently Asked <span>Questions</span></h6>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="faq-bar">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom">
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
                        <div class="accordion-item aos-init aos-animate" data-aos="fade-up" data-aos-duration="1100" data-aos-anchor-placement="top-bottom">
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
                        <div class="accordion-item aos-init aos-animate" data-aos="fade-up" data-aos-duration="1200" data-aos-anchor-placement="top-bottom">
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
<section class="letter-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <section class="newsletter aos-init aos-animate" data-aos="zoom-in-up" data-aos-duration="1200" data-aos-anchor-placement="top-bottom">
                    <div class="newsletter__content">
                        <div class="newsletter__text">
                            <h2>Join Our News Letter</h2>
                            <p>
                                Never miss important updates, events, and 
                                career opportunities.
                            </p>
                        </div>
                        <form class="newsletter__form">
                            <input type="text" placeholder="Contact No." required>
                            <input type="email" placeholder="Example@gmail.com" required>
                            <button type="submit" class="join-btn">Join</button>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </div>
</section>
@endsection
@push('scripts')
<script>
    $(document).ready(function() {
		$(".gallery-tabs li").click(function() {
			let tab = $(this).data("tab");
			$(".gallery-tabs li")
				.removeClass("active");
			$(this)
				.addClass("active");
			$(".gallery-panel")
				.removeClass("active");
			$("#" + tab)
				.addClass("active");
		});
		// Gallery Data
		const galleries = {
			coworking: [
				"{{ asset('assets/images/img14.png') }}",
				"{{ asset('assets/images/img15.png') }}"
			],
			campus: [
				"{{ asset('assets/images/img14.png') }}"
			]
		};
		// Popup Swiper
		let popupSwiper = new Swiper(".popupSlider", {
			loop: false,
			navigation: {
				nextEl: ".swiper-button-next",
				prevEl: ".swiper-button-prev"
			}
		});
		// Eye Click
		$(".view-btn").click(function() {
			let galleryName =
				$(this).data("gallery");
			let index =
				Number($(this).data("index"));
			let images =
				galleries[galleryName];
			// remove old images
			popupSwiper.removeAllSlides();
			// add new images
			images.forEach(function(img) {
				popupSwiper.appendSlide(
					'<div class="swiper-slide">' +
					'<img src="' + img + '">' +
					'</div>'
				);
			});
			popupSwiper.update();
			// open clicked image
			popupSwiper.slideTo(index, 0);
			// Bootstrap 5 Modal
			let modal =
				new bootstrap.Modal(
					document.getElementById("galleryModal")
				);
			modal.show();
		});
	});
</script>
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
    		infinite: true,
    		arrows: true,
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
						slidesToShow: 3,
					}
				},
				{
					breakpoint: 767,
					settings: {
						slidesToShow: 2,
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