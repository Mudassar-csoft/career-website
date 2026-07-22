@extends('layouts.app')
@section('title', 'Coworking Space | Career Website')
@section('body_class', 'cws-page')
@section('content')
<section class="top-banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <p>Our modern spaces are simply stunning</p>
                <h1>Coworking Space for Success</h1>
                <div class="btn-block">
                    <a href="#" class="btn aq-btn">Get Quote</a>
                    <a href="#" class="btn wa-btn">Watch Now</a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="two-block">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5">
                <h2>
                    Where Ambition Meets<br>
                    Opportunity - Explore<br>
                    the spaces today!
                </h2>
                <p>
                    Our modern office spaces provide freelancers, entrepreneurs, and teams with comfortable work areas.
                </p>
                <p>
                    Explore today and find the perfect environment to enhance your productivity and achieve your goals! Experience the difference of a workspace designed to support your success and innovation.
                </p>
            </div>
            <div class="col-lg-7">
                <div class="img-hold">
                    <img src="{{ asset('assets/images/img19.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<section class="work-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3>Work Comfortably</h3>
                <h2>Experience More Than Just a Space!</h2>
                <p>
                    All essentials provided for a productive workspace
                </p>
            </div>
            <div class="col-lg-12">
                <div class="workspace-slider">
                    <div class="workspace-item">
                        <img src="{{ asset('assets/images/img20.png') }}">
                        <h5>Meeting Room</h5>
                    </div>
                    <div class="workspace-item small">
                        <img src="{{ asset('assets/images/img21.png') }}">
                        <h5>Private <br>Office</h5>
                    </div>
                    <div class="workspace-item large">
                        <img src="{{ asset('assets/images/img22.png') }}">
                        <h5>Dedicated Desk</h5>
                    </div>
                    <div class="workspace-item mid">
                        <img src="{{ asset('assets/images/img23.png') }}">
                        <h5>Event Space</h5>
                    </div>
                    <div class="workspace-item small">
                        <img src="{{ asset('assets/images/img24.png') }}">
                        <h5>Meeting Room</h5>
                    </div>
                    <div class="workspace-item end">
                        <img src="{{ asset('assets/images/img25.png') }}">
                        <h5>Virtual Office</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="fea-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>
                    Featured
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <ul>
                        <li>
                            <div class="img-hold">
                                <img src="{{ asset('assets/images/icon34.svg') }}" alt="">
                            </div>
                            <h3>Free Wifi Access</h3>
                            <p>
                                High-speed internet for
                                seamless connectivity.
                            </p>
                        </li>
                        <li>
                            <div class="img-hold">
                                <img src="{{ asset('assets/images/icon35.svg') }}" alt="">
                            </div>
                            <h3>Tea and Coffee</h3>
                            <p>
                                Tea and coffee available to
                                keep you refreshed.
                            </p>
                        </li>
                        <li>
                            <div class="img-hold">
                                <img src="{{ asset('assets/images/icon36.svg') }}" alt="">
                            </div>
                            <h3>Free Wifi Access</h3>
                            <p>
                                Access available anytime,
                                day or night.
                            </p>
                        </li>
                        <li>
                            <div class="img-hold">
                                <img src="{{ asset('assets/images/icon37.svg') }}" alt="">
                            </div>
                            <h3>Free Parking</h3>
                            <p>
                                Free parking for a
                                stress-free commute.
                            </p>
                        </li>
                    </ul>
                    <ul>
                        <li>
                            <div class="img-hold">
                                <img src="{{ asset('assets/images/icon38.svg') }}" alt="">
                            </div>
                            <h3>Support Center</h3>
                            <p>
                                On-hand assistance for a
                                smooth experience.
                            </p>
                        </li>
                        <li>
                            <div class="img-hold">
                                <img src="{{ asset('assets/images/icon39.svg') }}" alt="">
                            </div>
                            <h3>Business community</h3>
                            <p>
                                Connect with a network
                                of professionals.
                            </p>
                        </li>
                        <li>
                            <div class="img-hold">
                                <img src="{{ asset('assets/images/icon40.svg') }}" alt="">
                            </div>
                            <h3>Events & Conferences</h3>
                            <p>
                                Engage in events to stay
                                updated and network.
                            </p>
                        </li>
                        <li>
                            <div class="img-hold">
                                <img src="{{ asset('assets/images/icon41.svg') }}" alt="">
                            </div>
                            <h3>Digital Library</h3>
                            <p>
                                Access resources and courses
                                to upskill.
                            </p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="chose-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="form-block">
                    <h3>Why you choose us</h3>
                    <h2>Flexible Coworking for Every Need</h2>
                    <p>
                        Enjoy a perfect workspace designed around you. From dedicated offices to dynamic<br>
                        shared spaces, our solutions offer the flexibility and value you need to succeed.<br>
                        We’re Here to Help You Achieve Your Goals!.
                    </p>
                    <form class="row g-2">
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Name">
                        </div>
                        <div class="col-md-6">
                            <input type="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Contact">
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="City">
                        </div>
                        <div class="col-md-6">
                            <select class="form-select">
                                <option selected>I’m Intrested in</option>
                                <option>...</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="No of Persons">
                        </div>
                        <div class="col-12 text-center">
                            <button type="submit" class="btn sr-btn">Submit Request</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="co-say">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="bar">
                    <div class="img-hold">
                        <img src="{{ asset('assets/images/img26.png') }}" alt="">
                    </div>
                    <div class="t-bar">
                        <h2>What Our Coworkers Say</h2>
                        <a href="#" class="btn tv-btn">Testimonial Video</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="video-box">
                    <button class="btn" data-bs-toggle="modal" data-bs-target="#videoModal">
                    <img src="{{ asset('assets/images/img27.png') }}" alt="">
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('scripts')
<script>
    $('.workspace-slider').slick({
                slidesToShow: 5,
                slidesToScroll: 1,
                arrows: false,
                dots: false,
                infinite: true,
                autoplay: true,
                autoplaySpeed: 0,
                speed: 8000,
                cssEase: 'linear',
                variableWidth: true,
                pauseOnHover: false,
                pauseOnFocus: false,
                swipe: true,
            });
</script>
<script>
    const videoModal = document.getElementById('videoModal');
            const video =	document.getElementById('popupVideo');
            // Modal open
            videoModal.addEventListener(
                'shown.bs.modal',
                function() {
                    video.play();
                }
            );
            //Modal close
            videoModal.addEventListener(
                'hidden.bs.modal',
                function() {
                    video.pause();
                }
            );
</script>
@endpush