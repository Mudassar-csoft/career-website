@extends('layouts.app')
@section('title', 'Events | Career Website')
@section('body_class', 'events-page')
@section('content')
<section class="top-banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>
                    Events
                </h2>
                <p>
                    Stay connected with Career Institute through seminars, workshops,<br>
                    orientations, conferences, project displays, and other engaging<br>
                    events designed to inspire learning, innovation, and career growth.
                </p>
            </div>
            <div class="col-lg-12">
                <div class="counter-box">
                    <div class="counter-item">
                        <h2 class="counter" data-target="120">+</h2>
                        <p>Events Organized</p>
                    </div>
                    <div class="counter-item">
                        <h2 class="counter" data-target="15">+</h2>
                        <p>Students Engaged</p>
                    </div>
                    <div class="counter-item">
                        <h2 class="counter" data-target="50">+</h2>
                        <p>Expert Speakers</p>
                    </div>
                    <div class="counter-item">
                        <h2 class="counter" data-target="8">+</h2>
                        <p>Cities Covered</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="events-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>
                    Upcoming Events
                </h2>
            </div>
        </div>
        <div class="row g-3">
            <div class="col-lg-3 col-sm-6">
                <div class="workshop-card">
                    <!-- Image -->
                    <div class="workshop-card__image">
                        <img src="{{ asset('assets/images/img64.png') }}" alt="Workshop">
                        <span class="workshop-card__badge">Institute</span>
                        <div class="date">
                            <h4>27</h4>
                            <span>Apr</span>
                        </div>
                    </div>
                    <!-- Content -->
                    <div class="workshop-card__body">
                        <h3 class="workshop-card__title">
                            Career Institute Signs Franchise MOU for Kohinoor FSD Branch
                        </h3>
                        <ul>
                            <li><img src="{{ asset('assets/images/icon128.svg') }}" alt=""> Lahore Wapda Town</li>
                            <li><img src="{{ asset('assets/images/icon129.svg') }}" alt=""> 10:00 AM-12:00PM</li>
                        </ul>
                        <!-- Bottom -->
                        <div class="workshop-card__footer">
                            <a href="#" class="workshop-card__btn">
                                Read More
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="workshop-card">
                    <!-- Image -->
                    <div class="workshop-card__image">
                        <img src="{{ asset('assets/images/img64.png') }}" alt="Workshop">
                        <span class="workshop-card__badge">Institute</span>
                        <div class="date">
                            <h4>27</h4>
                            <span>Apr</span>
                        </div>
                    </div>
                    <!-- Content -->
                    <div class="workshop-card__body">
                        <h3 class="workshop-card__title">
                            Career Institute Signs Franchise MOU for Kohinoor FSD Branch
                        </h3>
                        <ul>
                            <li><img src="{{ asset('assets/images/icon128.svg') }}" alt=""> Lahore Wapda Town</li>
                            <li><img src="{{ asset('assets/images/icon129.svg') }}" alt=""> 10:00 AM-12:00PM</li>
                        </ul>
                        <!-- Bottom -->
                        <div class="workshop-card__footer">
                            <a href="#" class="workshop-card__btn">
                                Read More
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="workshop-card">
                    <!-- Image -->
                    <div class="workshop-card__image">
                        <img src="{{ asset('assets/images/img64.png') }}" alt="Workshop">
                        <span class="workshop-card__badge">Institute</span>
                        <div class="date">
                            <h4>27</h4>
                            <span>Apr</span>
                        </div>
                    </div>
                    <!-- Content -->
                    <div class="workshop-card__body">
                        <h3 class="workshop-card__title">
                            Career Institute Signs Franchise MOU for Kohinoor FSD Branch
                        </h3>
                        <ul>
                            <li><img src="{{ asset('assets/images/icon128.svg') }}" alt=""> Lahore Wapda Town</li>
                            <li><img src="{{ asset('assets/images/icon129.svg') }}" alt=""> 10:00 AM-12:00PM</li>
                        </ul>
                        <!-- Bottom -->
                        <div class="workshop-card__footer">
                            <a href="#" class="workshop-card__btn">
                                Read More
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="workshop-card">
                    <!-- Image -->
                    <div class="workshop-card__image">
                        <img src="{{ asset('assets/images/img64.png') }}" alt="Workshop">
                        <span class="workshop-card__badge">Institute</span>
                        <div class="date">
                            <h4>27</h4>
                            <span>Apr</span>
                        </div>
                    </div>
                    <!-- Content -->
                    <div class="workshop-card__body">
                        <h3 class="workshop-card__title">
                            Career Institute Signs Franchise MOU for Kohinoor FSD Branch
                        </h3>
                        <ul>
                            <li><img src="{{ asset('assets/images/icon128.svg') }}" alt=""> Lahore Wapda Town</li>
                            <li><img src="{{ asset('assets/images/icon129.svg') }}" alt=""> 10:00 AM-12:00PM</li>
                        </ul>
                        <!-- Bottom -->
                        <div class="workshop-card__footer">
                            <a href="#" class="workshop-card__btn">
                                Read More
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 mt-4">
                <div class="btn-bar">
                    <a href="#" class="more-btn btn">
                        Read More
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="rcre-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 mb-4 mb-lg-0">
                <h2>
                    Event Category
                </h2>
                <ul class="mb-3 d-none d-sm-flex">
                    <li>
                        <a href="#">
                            <img src="{{ asset('assets/images/icon131.svg') }}" alt="">
                            <h3>Seminars & <br>Webinars</h3>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="{{ asset('assets/images/icon132.svg') }}" alt="">
                            <h3>Workshops</h3>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="{{ asset('assets/images/icon130.svg') }}" alt="">
                            <h3>Conferences</h3>
                        </a>
                    </li>
                </ul>
                <ul class="d-none d-sm-flex">
                    <li>
                        <a href="#">
                            <img src="{{ asset('assets/images/icon134.svg') }}" alt="">
                            <h3>Project Displays</h3>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="{{ asset('assets/images/icon133.svg') }}" alt="">
                            <h3>Job Fairs</h3>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="{{ asset('assets/images/icon135.svg') }}" alt="">
                            <h3>Celebrations</h3>
                        </a>
                    </li>
                </ul>
                <ul class="d-sm-none">
                    <li>
                        <a href="#">
                            <img src="{{ asset('assets/images/icon131.svg') }}" alt="">
                            <h3>Seminars & <br>Webinars</h3>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="{{ asset('assets/images/icon132.svg') }}" alt="">
                            <h3>Workshops</h3>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="{{ asset('assets/images/icon130.svg') }}" alt="">
                            <h3>Conferences</h3>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="{{ asset('assets/images/icon134.svg') }}" alt="">
                            <h3>Project Displays</h3>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="{{ asset('assets/images/icon133.svg') }}" alt="">
                            <h3>Job Fairs</h3>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="{{ asset('assets/images/icon135.svg') }}" alt="">
                            <h3>Celebrations</h3>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-7">
                <div class="box">
                    <h2>
                        Our Recent Events
                    </h2>
                    <a href="#" class="more-btn btn">
                        View all Recent Events
                    </a>
                </div>
                <div class="row g-2">
                    <div class="col-lg-3 col-md-3 col-6 px-1">
                        <div class="block">
                            <img src="{{ asset('assets/images/img65.png') }}" alt="">
                            <h4>
                                MOU Signing
                                Ceremony
                            </h4>
                            <ul>
                                <li><img src="{{ asset('assets/images/icon128.svg') }}" alt=""> Lahore Wapda Town</li>
                                <li><img src="{{ asset('assets/images/icon129.svg') }}" alt=""> 10:00 AM-12:00PM</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-6 px-1">
                        <div class="block">
                            <img src="{{ asset('assets/images/img65.png') }}" alt="">
                            <h4>
                                MOU Signing
                                Ceremony
                            </h4>
                            <ul>
                                <li><img src="{{ asset('assets/images/icon128.svg') }}" alt=""> Lahore Wapda Town</li>
                                <li><img src="{{ asset('assets/images/icon129.svg') }}" alt=""> 10:00 AM-12:00PM</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-6 px-1">
                        <div class="block">
                            <img src="{{ asset('assets/images/img65.png') }}" alt="">
                            <h4>
                                MOU Signing
                                Ceremony
                            </h4>
                            <ul>
                                <li><img src="{{ asset('assets/images/icon128.svg') }}" alt=""> Lahore Wapda Town</li>
                                <li><img src="{{ asset('assets/images/icon129.svg') }}" alt=""> 10:00 AM-12:00PM</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-6 px-1">
                        <div class="block">
                            <img src="{{ asset('assets/images/img65.png') }}" alt="">
                            <h4>
                                MOU Signing
                                Ceremony
                            </h4>
                            <ul>
                                <li><img src="{{ asset('assets/images/icon128.svg') }}" alt=""> Lahore Wapda Town</li>
                                <li><img src="{{ asset('assets/images/icon129.svg') }}" alt=""> 10:00 AM-12:00PM</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="gallery-bar">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 aos-init aos-animate" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="900">
                <h2>Highlights from Recent Events</h2>
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
                        <form class="newsletter__form lead-form" method="POST" action="{{ route('subscribers.store') }}">
                            @csrf
                            <input type="text" name="phone" placeholder="Contact No." required>
                            <input type="email" name="email" placeholder="Example@gmail.com" required>
                            <button type="submit" class="join-btn">Join</button>
                            <input type="hidden" name="source" value="Newsletter - Events">
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
    // Counter Animation
    const counters = document.querySelectorAll('.counter');
    counters.forEach(counter => {
        counter.innerText = '0';
        const updateCounter = () => {
            const target = +counter.getAttribute('data-target');
            const count = +counter.innerText;
            const increment = target / 200; // Adjust the speed of the counter

            if (count < target) {
                counter.innerText = `${Math.ceil(count + increment)}`;
                setTimeout(updateCounter, 10);
            } else {
                counter.innerText = target;
            }
        };
        updateCounter();
    });
</script>
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
@endpush