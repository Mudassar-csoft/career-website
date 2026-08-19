@extends('layouts.app')
@section('title', 'Event Detail | Career Website')
@section('body_class', 'event-detail')
@section('content')
<section class="top-banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h2>
                    Career Institute Signs <br>
                    Franchise MOU for Kohinoor FSD Branch
                </h2>
                <ul>
                    <li>
                        <img src=" {{ asset('assets/images/icon111.svg') }}" alt="">
                        10:00am-12-00pm
                    </li>
                    <li>
                        <img src=" {{ asset('assets/images/icon138.svg') }}" alt="">
                        27 April 2026
                    </li>
                    <li>
                        <img src=" {{ asset('assets/images/icon139.svg') }}" alt="">
                        Lahore Wapda Town
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="two-block">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="event-slider">
                    <div>
                        <img src="{{ asset('assets/images/img61.png') }}" alt="">
                    </div>
                    <div>
                        <img src="{{ asset('assets/images/img61.png') }}" alt="">
                    </div>
                </div>
                <div class="head-text">
                    <h2>
                        About This Event
                    </h2>
                    <a href="#"><img src="{{ asset('assets/images/share.svg') }}" alt="">Share</a>
                </div>
                <div class="detail-text">
                    <p>
                        Career Institute proudly organized the Franchise MOU Signing
                        Ceremony with Kohinoor FSD Branch to strengthen educational
                        partnerships and expand access to quality technical and
                        professional education. The event brought together education
                        professionals, industry experts, and students to discuss future
                        collaboration, innovation, and career development opportunities.
                        Participants enjoyed keynote speeches, networking sessions,
                        and an interactive discussion highlighting the institute's vision
                        for empowering students through practical learning and
                        industry-focused education.
                    </p>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="side-bar">
                    <div class="box">
                        <ul>
                            <h2>Event Information</h2>
                            <li>
                                <span>Date</span>
                                <span>27 April 2026</span>
                            </li>
                            <li>
                                <span>Time</span>
                                <span>10:00am-12:00pm</span>
                            </li>
                            <li>
                                <span>Venue</span>
                                <span>Career Institute Satyana Road Branch</span>
                            </li>
                            <li>
                                <span>Organizer</span>
                                <span>Career Institute</span>
                            </li>
                            <li>
                                <span>Category</span>
                                <span>Workshop</span>
                            </li>
                            <li>
                                <span>Fee</span>
                                <span>Fee</span>
                            </li>
                            <li>
                                <span>Seats</span>
                                <span>200</span>
                            </li>
                        </ul>
                        <a href="#" class="btn rn-btn">Register Now</a>
                    </div>
                    <div class="sm-box">
                        <h2>Event Highlights</h2>
                        <ul>
                            <li>
                                <img src=" {{ asset('assets/images/icon140.svg') }}" alt="">
                                <p>
                                    Seminars & <br>
                                    Webinars
                                </p>
                            </li>
                            <li>
                                <img src=" {{ asset('assets/images/icon141.svg') }}" alt="">
                                <p>
                                    Networking <br>
                                    Session
                                </p>
                            </li>
                            <li>
                                <img src=" {{ asset('assets/images/icon142.svg') }}" alt="">
                                <p>
                                    Certificate <br>
                                    Distribution
                                </p>
                            </li>
                            <li>
                                <img src=" {{ asset('assets/images/icon143.svg') }}" alt="">
                                <p>
                                    Q&A <br>
                                    Session
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('partials.site-gallery', ['moreGalleryUrl' => route('gallery')])
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
