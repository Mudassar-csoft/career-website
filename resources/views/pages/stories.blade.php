@extends('layouts.app')
@section('title', 'Success Stories | Career Website')
@section('body_class', 'ss-page')
@section('content')
<section class="particle-section">
    <h1 class="visually-hidden">Career Institute Success Stories</h1>
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
                        <img src="{{ asset('assets/images/img52.png') }}" alt="Career Institute student success story">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="success-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="success-story-wrapper">
                    <!-- MAIN SLIDER -->
                    <div class="success-main-slider">
                        @forelse ($successStories as $story)
                            <div class="success-main-slide">
                                <div class="success-card">
                                    <div class="success-image">
                                        <img src="{{ $story->image_url }}" alt="{{ $story->name }}" onerror="this.src='{{ asset('assets/images/img58.png') }}'; this.onerror=null;">
                                    </div>
                                    <div class="success-content">
                                        <h2>{{ $story->name }}</h2>
                                        <span class="success-program">{{ $story->program }}</span>
                                        <span class="success-location"><i class="fas fa-map-marker-alt"></i> {{ $story->location }}</span>
                                        <div class="success-before-after">
                                            <div class="before-box"><span>Before</span><p>{{ $story->before_story }}</p></div>
                                            <div class="after-box"><span>After</span><p>{{ $story->after_story }}</p></div>
                                        </div>
                                        @if (! empty($story->journey_steps))
                                            <h3>Journey</h3>
                                            <div class="journey">
                                                @foreach ($story->journey_steps as $index => $step)
                                                    <div class="journey-item">
                                                        <div class="journey-icon"><img src="{{ asset('assets/images/icon'.(88 + $index).'.svg') }}" alt="Career Institute feature icon"></div>
                                                        <span>{{ $step }}</span>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="success-main-slide"><div class="success-card"><div class="success-content"><h2>Success Stories Coming Soon</h2></div></div></div>
                        @endforelse
                    </div>
                    <div class="success-nav-slider">
                        @forelse ($successStories as $story)
                            <div class="success-nav-item">
                                <div class="nav-student">
                                    <img src="{{ $story->image_url }}" alt="{{ $story->name }}" onerror="this.src='{{ asset('assets/images/img58.png') }}'; this.onerror=null;">
                                    <div>
                                        <h4>{{ $story->name }}</h4>
                                        <span>{{ $story->role }}</span>
                                        <small><i class="fas fa-map-marker-alt"></i> {{ $story->location }}</small>
                                    </div>
                                </div>
                                <p>{{ $story->role }}@if ($story->company) at <strong>{{ $story->company }}</strong>@endif</p>
                            </div>
                        @empty
                            <div class="success-nav-item"><p>No stories available yet.</p></div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="top-bar">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="aos-init aos-animate" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1000">Top Achievers</h2>
            </div>
            <div class="col-lg-12">
                <div class="img-hold">
                    <img src="{{ asset('assets/images/img102.png') }}" alt="Career Institute student success story">
                </div>
            </div>
        </div>
    </div>
</section>
<section class="feature-block">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="aos-init aos-animate" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1000">Featured Success Stories</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="feature-slider">
                    @forelse ($successStories as $story)
                        <div>
                            <div class="box">
                                <div class="img-hold">
                                    <img src="{{ $story->image_url }}" alt="{{ $story->name }}" onerror="this.src='{{ asset('assets/images/img54.png') }}'; this.onerror=null;">
                                </div>
                                <div class="text-hold">
                                    <h3>{{ $story->name }}</h3>
                                    <h4><span>Course:</span> {{ $story->program }}</h4>
                                    <ul>
                                        <li><span><img src="{{ asset('assets/images/icon86.svg') }}" alt="Career Institute feature icon">{{ $story->role }}</span></li>
                                        @if ($story->company)
                                            <li><span><img src="{{ asset('assets/images/icon87.svg') }}" alt="Career Institute feature icon">{{ $story->company }}</span></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div><div class="box"><div class="text-hold"><p>Success stories will appear here soon.</p></div></div></div>
                    @endforelse
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
                                <img src="assets/images/img96.jpeg" alt="Career Institute student success video">
                                <a class="play-btn" href="https://www.youtube.com/shorts/lvrB2hzsLcg" target="_blank" rel="noopener noreferrer" aria-label="Watch student experience video 1 on YouTube">
                                    <img src="assets/images/ply-btn.png" alt="Play video">
                                </a>
                            </div>
                        </div>
                        <!-- Slide 2 -->
                        <div class="swiper-slide">
                            <div class="video-card">
                                <img src="assets/images/img97.jpeg" alt="Career Institute student success video">
                                <a class="play-btn" href="https://www.youtube.com/shorts/uUGPHFbceoE" target="_blank" rel="noopener noreferrer" aria-label="Watch student experience video 2 on YouTube">
                                    <img src="assets/images/ply-btn.png" alt="Play video">
                                </a>
                            </div>
                        </div>
                        <!-- Slide 3 -->
                        <div class="swiper-slide">
                            <div class="video-card">
                                <img src="assets/images/img98.jpeg" alt="Career Institute student success video">
                                <a class="play-btn" href="https://www.youtube.com/shorts/xOJzCDvdh_4" target="_blank" rel="noopener noreferrer" aria-label="Watch student experience video 3 on YouTube">
                                    <img src="assets/images/ply-btn.png" alt="Play video">
                                </a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="video-card">
                                <img src="assets/images/img99.jpeg" alt="Career Institute student success video">
                                <a class="play-btn" href="https://www.youtube.com/shorts/j7X_zTbBhPI" target="_blank" rel="noopener noreferrer" aria-label="Watch student experience video 4 on YouTube">
                                    <img src="assets/images/ply-btn.png" alt="Play video">
                                </a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="video-card">
                                <img src="assets/images/img100.jpeg" alt="Career Institute student success video">
                                <a class="play-btn" href="https://www.youtube.com/shorts/Hc3C-Bfutjc" target="_blank" rel="noopener noreferrer" aria-label="Watch student experience video 5 on YouTube">
                                    <img src="assets/images/ply-btn.png" alt="Play video">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <a href="https://www.youtube.com/@CareerInstitutepk" class="btn ep-btn">Testimonial Video</a>
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
<section class="soical-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Keep in Touch</h2>
                <ul>
                    <li><a href="https://www.facebook.com/careerinstituteofficial" target="_blank" rel="noopener noreferrer" aria-label="Career Institute on Facebook"><img src="{{ asset('assets/images/fb.png') }}" alt="Facebook"></a></li>
                    <li><a href="https://www.instagram.com/careerinstituteofficial" target="_blank" rel="noopener noreferrer" aria-label="Career Institute on Instagram"><img src="{{ asset('assets/images/instagram.png') }}" alt="Instagram"></a></li>
                    <li><a href="https://www.youtube.com/@CareerInstitutepk" target="_blank" rel="noopener noreferrer" aria-label="Career Institute on YouTube"><img src="{{ asset('assets/images/youtube.png') }}" alt="YouTube"></a></li>
                    <li><a href="https://www.tiktok.com/@careerinstituteofficial" target="_blank" rel="noopener noreferrer" aria-label="Career Institute on TikTok"><img src="{{ asset('assets/images/tiktok.png') }}" alt="TikTok"></a></li>
                    <li><a href="https://www.linkedin.com/company/careerinstituteofficial/" target="_blank" rel="noopener noreferrer" aria-label="Career Institute on LinkedIn"><img src="{{ asset('assets/images/linkdin.png') }}" alt="LinkedIn"></a></li>
                    <li><a href="https://twitter.com/careerofficials" target="_blank" rel="noopener noreferrer" aria-label="Career Institute on X"><img src="{{ asset('assets/images/x.png') }}" alt="X"></a></li>
                    <li><a href="https://wa.me/923144444010" target="_blank" rel="noopener noreferrer" aria-label="Chat with Career Institute on WhatsApp"><img src="{{ asset('assets/images/wp.png') }}" alt="WhatsApp"></a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
@include('partials.site-faq-section', ['sectionExtraClass' => 'mb-5'])
@if(false)
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
@endif
@endsection
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
<script>
    particlesJS("particles-js", {
        particles: {
            number: {
                value: 90,
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
                distance: 150,
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
<script>
    $(document).ready(function () {
        $('.success-main-slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            asNavFor: '.success-nav-slider',
            adaptiveHeight: true
        });
        $('.success-nav-slider').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            asNavFor: '.success-main-slider',
            dots: false,
            arrows: false,
            focusOnSelect: true,
            vertical: true,
            verticalSwiping: true,
            infinite: true,
            responsive: [
                {
                    breakpoint: 1200,
                    settings: {
                        vertical: false,
                        verticalSwiping: false,
                        slidesToShow: 3
                    }
                },
                {
                    breakpoint: 767,
                    settings: {
                        vertical: false,
                        verticalSwiping: false,
                        slidesToShow: 2,
                    }
                },
                {
                    breakpoint: 450,
                    settings: {
                        vertical: false,
                        verticalSwiping: false,
                        slidesToShow: 1,
                    }
                }
            ]
        });
    });
</script>
@endpush
