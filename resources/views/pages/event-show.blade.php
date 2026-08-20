@extends('layouts.app')
@section('title', ($event->meta_title ?: $event->title).' | Career Website')
@section('meta_description', $event->meta_description ?: \Illuminate\Support\Str::limit(strip_tags($event->description), 160))
@section('meta_keywords', $event->meta_keywords ?? '')
@section('body_class', 'event-detail')
@push('styles')
<style>
    .event-detail .reg-form .form-msg {
        border-radius: 8px;
        padding: 10px 14px;
        margin: 0 0 15px;
        font: 400 14px/20px "Montserrat", sans-serif;
    }
    .event-detail .reg-form .form-msg.success {
        background: #E5F8F2;
        color: #03917a;
    }
    .event-detail .reg-form .form-msg.error {
        background: #FDE8E8;
        color: #c53030;
    }
    .event-detail .reg-form label {
        display: block;
        font: 500 13px/18px "Montserrat", sans-serif;
        color: #000;
        margin: 0 0 6px;
    }
    .event-detail .reg-form .field {
        margin: 0 0 14px;
    }
    .event-detail .reg-form input {
        width: 100%;
        padding: 10px 14px;
        border: 1px solid #E1E1E1;
        border-radius: 8px;
        font: 400 14px/20px "Montserrat", sans-serif;
        outline: none;
    }
    .event-detail .reg-form input:focus {
        border-color: #03C587;
    }
    .event-detail .reg-form .field-error {
        color: #c53030;
        font-size: 12px;
        margin: 4px 0 0;
    }
    .event-detail .closed-note {
        text-align: center;
        font: 500 15px/22px "Montserrat", sans-serif;
        color: #7c8a94;
        padding: 10px 0;
    }
</style>
@endpush
@section('content')
<section class="top-banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h2>{{ $event->title }}</h2>
                <ul>
                    <li>
                        <img src="{{ asset('assets/images/icon138.svg') }}" alt="">
                        {{ $event->event_date->format('d M Y') }}
                    </li>
                    <li>
                        <img src="{{ asset('assets/images/icon139.svg') }}" alt="">
                        {{ $event->venue }}
                    </li>
                    <li>
                        {{ $event->campus }}
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
                    @forelse ($event->display_images as $image)
                        <div>
                            <img src="{{ $image->image_url }}" alt="{{ $event->title }}" onerror="this.src='{{ asset('assets/images/img61.png') }}'; this.onerror=null;">
                        </div>
                    @empty
                        <div>
                            <img src="{{ asset('assets/images/img61.png') }}" alt="{{ $event->title }}">
                        </div>
                    @endforelse
                </div>
                <div class="head-text">
                    <h2>About This Event</h2>
                    <a href="#"><img src="{{ asset('assets/images/share.svg') }}" alt="">Share</a>
                </div>
                <div class="detail-text">
                    {!! $event->description !!}
                </div>
            </div>
            <div class="col-lg-5">
                <div class="side-bar">
                    <div class="box">
                        <ul>
                            <h2>Event Information</h2>
                            <li>
                                <span>Date</span>
                                <span>{{ $event->event_date->format('d M, Y') }}</span>
                            </li>
                            <li>
                                <span>Campus</span>
                                <span>{{ $event->campus }}</span>
                            </li>
                            <li>
                                <span>Venue</span>
                                <span>{{ $event->venue }}</span>
                            </li>
                            <li>
                                <span>Organizer</span>
                                <span>{{ $event->organizer }}</span>
                            </li>
                            <li>
                                <span>Category</span>
                                <span>{{ $event->category->name }}</span>
                            </li>
                            <li>
                                <span>Fee</span>
                                <span>{{ $event->is_paid ? 'Rs. '.number_format($event->fee_amount, 2) : 'Free' }}</span>
                            </li>
                            <li>
                                <span>Seats</span>
                                <span>{{ $event->has_seat_limit ? $event->seatsRemaining().' left of '.$event->seat_limit : 'Open' }}</span>
                            </li>
                        </ul>

                        @if (! $event->isUpcoming())
                            <p class="closed-note">This event has already taken place.</p>
                        @elseif (! $event->hasSeatsAvailable())
                            <p class="closed-note">This event is fully booked.</p>
                        @else
                            <div class="reg-form">
                                @if (session('status'))
                                    <p class="form-msg success">{{ session('status') }}</p>
                                @endif
                                @if ($errors->any())
                                    <p class="form-msg error">{{ $errors->first() }}</p>
                                @endif

                                <form action="{{ route('events.register', $event) }}" method="POST">
                                    @csrf
                                    <div class="field">
                                        <label for="reg-name">Full Name</label>
                                        <input type="text" id="reg-name" name="name" value="{{ old('name') }}" required>
                                        @error('name')
                                            <p class="field-error">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="field">
                                        <label for="reg-email">Email</label>
                                        <input type="email" id="reg-email" name="email" value="{{ old('email') }}" required>
                                        @error('email')
                                            <p class="field-error">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="field">
                                        <label for="reg-phone">Phone</label>
                                        <input type="text" id="reg-phone" name="phone" value="{{ old('phone') }}">
                                        @error('phone')
                                            <p class="field-error">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn rn-btn">Register Now</button>
                                </form>
                            </div>
                        @endif
                    </div>
                    <div class="sm-box">
                        <h2>Event Highlights</h2>
                        <ul>
                            <li>
                                <img src="{{ asset('assets/images/icon140.svg') }}" alt="">
                                <p>
                                    Seminars & <br>
                                    Webinars
                                </p>
                            </li>
                            <li>
                                <img src="{{ asset('assets/images/icon141.svg') }}" alt="">
                                <p>
                                    Networking <br>
                                    Session
                                </p>
                            </li>
                            <li>
                                <img src="{{ asset('assets/images/icon142.svg') }}" alt="">
                                <p>
                                    Certificate <br>
                                    Distribution
                                </p>
                            </li>
                            <li>
                                <img src="{{ asset('assets/images/icon143.svg') }}" alt="">
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
                        @forelse ($alumni as $alum)
                            <div class="item">
                                <div class="card-wrap">
                                    <div class="box">
                                        <div class="img-hold">
                                            <img src="{{ $alum->photo ? asset('storage/'.$alum->photo) : asset('assets/images/img05.png') }}" alt="{{ $alum->name }}">
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
                            <input type="hidden" name="source" value="Newsletter - Event Detail">
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
