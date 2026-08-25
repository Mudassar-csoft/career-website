@extends('layouts.app')
@section('title', ($course->meta_title ?: $course->title).' | Career Website')
@section('meta_description', $course->meta_description ?: \Illuminate\Support\Str::limit(strip_tags($course->about), 150, ''))
@section('meta_keywords', $course->meta_keywords ?? '')
@section('og_image', $course->image_url ?: asset('assets/images/img03.png'))
@section('body_class', 'course-detail')
@section('content')
<section class="cou-detail">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-xxl-7">
                @if ($course->is_featured)
                    <span>Featured</span>
                @endif
                <h1>{{ $course->title }}</h1>
                <p>
                    {{ $course->subtitle }}
                </p>
                <ul>
                    <li>
                        <strong class="pe-1">Category:</strong> {{ $course->category->name }}
                    </li>
                    <li>
                        <img src="{{ asset('assets/images/icon111.svg') }}" alt="Course schedule">
                        {{ $course->duration_weeks ? $course->duration_weeks.' Weeks' : 'Flexible' }}
                    </li>
                    <li>
                        <img src="{{ asset('assets/images/icon112.svg') }}" alt="Course duration">
                        {{ $course->mode->name }}
                    </li>
                    <li>
                        <img src="{{ asset('assets/images/icon113.svg') }}" alt="Course mode">
                        {{ $course->has_certificate ? 'Certificate Included' : 'No Certificate' }}
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="cou-info">
    <div class="container">
        <div class="row mb-4">
            <div class="col-lg-8">
                <div class="l-box">
                    <h3>About This Course </h3>
                    {!! $course->about !!}
                    @if ($course->what_you_will_learn)
                        <h3>
                            What You’ll Learn
                        </h3>
                        <ul>
                            @foreach ($course->what_you_will_learn as $point)
                                <li>
                                    <img src="{{ asset('assets/images/icon114.svg') }}" alt="Career Institute feature icon">
                                    {{ $point }}
                                </li>
                            @endforeach
                        </ul>
                    @endif
                    @if ($course->tools_technology)
                        <h3>
                            Tools & Technologies You'll Master
                        </h3>
                        <ul class="list-bar">
                            @foreach ($course->tools_technology as $tool)
                                <li>
                                    <img src="{{ asset('assets/images/icon115.svg') }}" alt="Career Institute feature icon">
                                    {{ $tool }}
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
            <div class="col-lg-4">
                <div class="rig-bar">
                    <div class="btn-bar">
                        <a href="#" class="btn en-btn" data-bs-toggle="modal" data-bs-target="#enroll-modal">Enroll Now</a>
                        <a href="#" class="btn db-btn" data-bs-toggle="modal" data-bs-target="#brochure-modal">Download Brochure</a>
                    </div>
                    <div class="s-link">
                        <h2>Share this Course</h2>
                        <ul>
                            <li><a href="#"><img src="{{ asset('assets/images/icon116.svg') }}" alt="Career Institute feature icon"></a></li>
                            <li><a href="#"><img src="{{ asset('assets/images/icon117.svg') }}" alt="Career Institute feature icon"></a></li>
                            <li><a href="#"><img src="{{ asset('assets/images/icon118.svg') }}" alt="Career Institute feature icon"></a></li>
                            <li><a href="#"><img src="{{ asset('assets/images/icon119.svg') }}" alt="Career Institute feature icon"></a></li>
                            <li><a href="#"><img src="{{ asset('assets/images/icon120.svg') }}" alt="Career Institute feature icon"></a></li>
                            <li><a href="#"><img src="{{ asset('assets/images/icon121.svg') }}" alt="Career Institute feature icon"></a></li>
                            <li><a href="#"><img src="{{ asset('assets/images/icon122.svg') }}" alt="Career Institute feature icon"></a></li>
                        </ul>
                    </div>
                    <div class="c-de">
                        <h3>This Course includes</h3>
                        <ul>
                            @forelse ($course->course_includes as $include)
                                <li>
                                    <img src="{{ asset('assets/images/icon123.svg') }}" alt="Course information">
                                    {{ $include }}
                                </li>
                            @empty
                            @endforelse
                        </ul>
                    </div>
                    <div class="dis-aera">
                        <h2>Have a Discount Voucher?</h2>
                        <form action="#">
                            <div class="row align-items-center">
                                <div class="col-lg-8 col-8 pe-0 pe-sm-2">
                                    <input
                                        type="text"
                                        class="form-control voucher-input"
                                        placeholder="Enter Discount Code">
                                </div>

                                <div class="col-lg-4 ps-2 col-4">
                                    <button type="submit" class="btn voucher-btn w-100">
                                        Apply Now
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="course-info">
                    <h2>
                        Course Curriculum
                        <span>{{ count($course->curriculum) }} Lectures</span>
                    </h2>
                    <div class="accordion-area">
                        <div class="accordion" id="accordionExample">
                            @forelse ($course->curriculum as $index => $lecture)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading{{ $index }}">
                                        <button class="accordion-button @if($index !== 0) collapsed @endif" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}" aria-expanded="{{ $index === 0 ? 'true' : 'false' }}" aria-controls="collapse{{ $index }}">
                                            <p>{{ $index + 1 }}. {{ $lecture['title'] }}</p>
                                        </button>
                                    </h2>
                                    <div id="collapse{{ $index }}" class="accordion-collapse collapse @if($index === 0) show @endif" aria-labelledby="heading{{ $index }}" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p>{{ $lecture['content'] }}</p>
                                        </div>
                                    </div>
                                </div>
                            @empty
                            @endforelse
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
<section class="info-bar">
    <div class="container">
        <div class="ru-banner mb-5">
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
                    <p class="text-center">
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
                            <textarea placeholder="Message" class="form-control" rows="9"></textarea>
                        </div>
                        <div class="col-12 text-center mt-4">
                            <button type="submit" class="btn sm-btn">Send Message</button>
                        </div>
                        <input type="hidden" name="source" value="Course Detail Enroll">
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
                    <li><a href="https://www.tiktok.com/@careerinstituteofficial" target="_blank" rel="noopener noreferrer" aria-label="Career Institute on TikTok"><img src="{{ asset('assets/images/tiktok.png') }}" alt="TikTok"></a></li>
                    <li><a href="https://www.linkedin.com/company/careerinstituteofficial/" target="_blank" rel="noopener noreferrer" aria-label="Career Institute on LinkedIn"><img src="{{ asset('assets/images/linkdin.png') }}" alt="LinkedIn"></a></li>
                    <li><a href="https://twitter.com/careerofficials" target="_blank" rel="noopener noreferrer" aria-label="Career Institute on X"><img src="{{ asset('assets/images/x.png') }}" alt="X"></a></li>
                    <li><a href="https://wa.me/923144444010" target="_blank" rel="noopener noreferrer" aria-label="Chat with Career Institute on WhatsApp"><img src="{{ asset('assets/images/wp.png') }}" alt="WhatsApp"></a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
@include('partials.campus-locations')
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
