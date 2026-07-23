@extends('layouts.app')
@section('title', 'Success Stories | Career Website')
@section('body_class', 'ss-page')
@section('content')
<section class="particle-section">
    <div id="particles-js"></div>
    <div class="particle-content">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="t-area">
                        <h2>
                            Real Students.<br>
                            Real Success Stories.
                        </h2>
                        <p>
                            Discover how our students transformed their<br>
                            careers, improved their skills, and achieved their<br>
                            goals through dedication and learning.
                        </p>
                        <a href="#" class="btn jn-btn">Join Now</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="img-hold">
                        <img src="{{ asset('assets/images/img52.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="video-block">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mb-4">
                <h2 class="aos-init aos-animate" data-aos="zoom-in" data-aos-duration="1000">Real Experiences From Real Students</h2>
            </div>
        </div>
        <div class="row mb-5" >
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
        <div class="row">
            <div class="col-lg-12">
                <a href="#" class="btn ep-btn">Testimonial Video</a>
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
<section class="faq-area mb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3>Do You Need Help?</h3>
                <h6>Frequently Asked <span>Questions</span></h6>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="faq-bar">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
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
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aut, reiciendis maxime voluptates nulla repudiandae ullam maiores quia? Ipsum, illum sit assumenda, esse sequi quia quo blanditiis ratione quidem vero possimus?</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry?
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
@endsection
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
<script>
    particlesJS("particles-js", {
        particles: {
            number: {
                value: 150,
                density: {
                    enable: true,
                    value_area: 800
                }
            },
            color: {
                value: "#fff"
            },
            shape: {
                type: "circle"
            },
            opacity: {
                value: 0.5,
                random: true
            },
            size: {
                value: 5,
                random: true
            },
            line_linked: {
                enable: true,
                distance: 180,
                color: "#fff",
                opacity: 0.4,
                width: 1
            },
            move: {
                enable: true,
                speed: 2.5,
                direction: "none",
                random: false,
                straight: false,
                out_mode: "out",
                bounce: false
            }
        },
        interactivity: {
            detect_on: "canvas",
            events: {
                onhover: {
                    enable: true,
                    mode: "grab"
                },
                onclick: {
                    enable: true,
                    mode: "push"
                },
                resize: true
            },
            modes: {
                grab: {
                    distance: 180,
                    line_linked: {
                        opacity: 0.7
                    }
                },
                push: {
                    particles_nb: 4
                }
            }
        },
        retina_detect: true

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