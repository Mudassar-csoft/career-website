@extends('layouts.app')
@section('title', 'Events | Career Website')
@section('body_class', 'events-page')
@push('styles')
<style>
    .events-page .filter-note {
        margin: 10px 0 0;
        font-size: 14px;
        line-height: 20px;
        color: #5f6b76;
    }
    .events-page .filter-note a {
        color: #009db8;
        font-weight: 600;
    }
    .events-page .section-empty,
    .events-page .gallery-empty {
        padding: 20px;
        border: 1px solid #dbdbdb;
        border-radius: 12px;
        background: #fff;
        font-size: 15px;
        line-height: 22px;
        color: #5f6b76;
    }
    .events-page .rcre-area ul li.is-active {
        border-color: #03c587;
        background: rgba(3, 197, 135, 0.08);
    }
    .events-page .rcre-area .category-link {
        display: flex;
        align-items: center;
        gap: 12px;
        width: 100%;
        color: inherit;
    }
    .events-page .rcre-area .category-link img {
        flex-shrink: 0;
    }
    .events-page .rcre-area .category-meta {
        display: block;
        margin-top: 6px;
        font-size: 12px;
        line-height: 16px;
        color: #5f6b76;
    }
    .events-page .rcre-area a.block {
        display: block;
        height: 100%;
        color: inherit;
    }
    .events-page .gallery-bar .gallery-tabs li {
        max-width: 240px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .events-page .gallery-bar .gallery-panel .gallery-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
</style>
@endpush
@section('content')
<section class="top-banner">
    <h1 class="visually-hidden">Career Institute Events</h1>
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
<section class="events-area" id="upcoming-events">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>
                    Upcoming Events
                </h2>
                @if ($selectedCategory)
                    <p class="filter-note">
                        Showing {{ $selectedCategory->name }} events.
                        <a href="{{ route('events') }}">Clear filter</a>
                    </p>
                @endif
            </div>
        </div>
        <div class="row">
            @forelse ($upcomingEvents as $upcomingEvent)
                <div class="col-lg-3">
                    <div class="workshop-card">
                        <!-- Image -->
                        <div class="workshop-card__image">
                            <img src="{{ $upcomingEvent->primary_image_url ?: asset('assets/images/img64.png') }}" alt="{{ $upcomingEvent->title }}" onerror="this.src='{{ asset('assets/images/img64.png') }}'; this.onerror=null;">
                            <span class="workshop-card__badge">{{ $upcomingEvent->category->name }}</span>
                            <div class="date">
                                <h4>{{ $upcomingEvent->event_date->format('d') }}</h4>
                                <span>{{ $upcomingEvent->event_date->format('M') }}</span>
                            </div>
                        </div>
                        <!-- Content -->
                        <div class="workshop-card__body">
                            <h3 class="workshop-card__title">
                                {{ $upcomingEvent->title }}
                            </h3>
                            <ul>
                                <li><img src="{{ asset('assets/images/icon128.svg') }}" alt=""> {{ $upcomingEvent->campus }}</li>
                                <li><img src="{{ asset('assets/images/icon129.svg') }}" alt=""> {{ $upcomingEvent->venue }}</li>
                            </ul>
                            <!-- Bottom -->
                            <div class="workshop-card__footer">
                                <a href="{{ route('events.show', $upcomingEvent) }}" class="workshop-card__btn">
                                    Read More
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-lg-12">
                    <p>No upcoming events right now. Check back soon.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>
@php
    $categoryIconMap = [
        'seminar' => 'assets/images/icon131.svg',
        'webinar' => 'assets/images/icon131.svg',
        'workshop' => 'assets/images/icon132.svg',
        'conference' => 'assets/images/icon130.svg',
        'expo' => 'assets/images/icon130.svg',
        'project' => 'assets/images/icon134.svg',
        'job' => 'assets/images/icon133.svg',
        'fair' => 'assets/images/icon133.svg',
        'celebration' => 'assets/images/icon135.svg',
        'ceremony' => 'assets/images/icon135.svg',
    ];

    $resolveCategoryIcon = function ($category) use ($categoryIconMap) {
        $haystack = strtolower($category->slug.' '.$category->name);

        foreach ($categoryIconMap as $keyword => $icon) {
            if (str_contains($haystack, $keyword)) {
                return asset($icon);
            }
        }

        return asset('assets/images/icon130.svg');
    };

    $highlightGalleries = $highlightEvents->mapWithKeys(function ($event) {
        return [
            'event-'.$event->id => $event->display_images
                ->map(fn ($image) => $image->image_url)
                ->values()
                ->all(),
        ];
    })->toArray();
@endphp
<section class="rcre-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 mb-4 mb-lg-0">
                <h2>
                    Event Category
                </h2>
                @if ($eventCategories->isEmpty())
                    <div class="section-empty">No event categories available yet.</div>
                @else
                    @foreach ($eventCategories->chunk(3) as $row)
                        <ul class="@if (! $loop->last) mb-3 @endif d-none d-sm-flex">
                            @foreach ($row as $category)
                                <li class="@if ($selectedCategory?->id === $category->id) is-active @endif">
                                    <a href="{{ route('events', ['category' => $category->slug]) }}" class="category-link">
                                        <img src="{{ $resolveCategoryIcon($category) }}" alt="{{ $category->name }}">
                                        <div>
                                            <h3>{{ $category->name }}</h3>
                                            <span class="category-meta">{{ $category->events_count }} {{ \Illuminate\Support\Str::plural('Event', $category->events_count) }}</span>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @endforeach
                    <ul class="d-sm-none">
                        @foreach ($eventCategories as $category)
                            <li class="@if ($selectedCategory?->id === $category->id) is-active @endif">
                                <a href="{{ route('events', ['category' => $category->slug]) }}" class="category-link">
                                    <img src="{{ $resolveCategoryIcon($category) }}" alt="{{ $category->name }}">
                                    <div>
                                        <h3>{{ $category->name }}</h3>
                                        <span class="category-meta">{{ $category->events_count }} {{ \Illuminate\Support\Str::plural('Event', $category->events_count) }}</span>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
            <div class="col-lg-7" id="recent-events-grid">
                <div class="box">
                    <h2>
                        Our Recent Events
                    </h2>
                    @if ($selectedCategory)
                        <a href="{{ route('events') }}" class="btn more-btn">All Categories</a>
                    @else
                        <a href="#upcoming-events" class="btn more-btn">Upcoming Events</a>
                    @endif
                </div>
                @if ($recentEvents->isEmpty())
                    <div class="section-empty">No recent events found for this selection yet.</div>
                @else
                    <div class="row g-2">
                        @foreach ($recentEvents as $recentEvent)
                            <div class="col-lg-3 col-md-3 col-6 px-1">
                                <a href="{{ route('events.show', $recentEvent) }}" class="block">
                                    <img src="{{ $recentEvent->primary_image_url ?: asset('assets/images/img65.png') }}" alt="{{ $recentEvent->title }}" onerror="this.src='{{ asset('assets/images/img65.png') }}'; this.onerror=null;">
                                    <h4>{{ \Illuminate\Support\Str::limit($recentEvent->title, 34) }}</h4>
                                    <ul>
                                        <li><img src="{{ asset('assets/images/icon128.svg') }}" alt=""> {{ $recentEvent->campus }}</li>
                                        <li><img src="{{ asset('assets/images/icon138.svg') }}" alt=""> {{ $recentEvent->event_date->format('d M, Y') }}</li>
                                    </ul>
                                </a>
                            </div>
                        @endforeach
                    </div>
                @endif
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
                @if ($highlightEvents->isEmpty())
                    <div class="gallery-empty">No event highlights are available yet.</div>
                @else
                    <div class="gallery-section">
                        <ul class="gallery-tabs">
                            @foreach ($highlightEvents as $highlightEvent)
                                <li class="@if ($loop->first) active @endif" data-tab="event-{{ $highlightEvent->id }}">{{ \Illuminate\Support\Str::limit($highlightEvent->title, 28) }}</li>
                            @endforeach
                        </ul>
                        <div class="gallery-content">
                            @foreach ($highlightEvents as $highlightEvent)
                                <div class="gallery-panel @if ($loop->first) active @endif" id="event-{{ $highlightEvent->id }}">
                                    @foreach ($highlightEvent->display_images->take(8) as $imageIndex => $image)
                                        <div class="gallery-item">
                                            <img src="{{ $image->image_url }}" alt="{{ $highlightEvent->title }}" onerror="this.src='{{ asset('assets/images/img14.png') }}'; this.onerror=null;">
                                            <div class="detial">
                                                <h3>{{ \Illuminate\Support\Str::limit($highlightEvent->title, 42) }}</h3>
                                                <button class="view-btn" data-gallery="event-{{ $highlightEvent->id }}" data-index="{{ $imageIndex }}">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="btn-area">
                        <a href="{{ route('events.show', $highlightEvents->first()) }}" class="btn more-btn">More Gallery</a>
                    </div>
                @endif
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
            $(".gallery-tabs li").removeClass("active");
            $(this).addClass("active");
            $(".gallery-panel").removeClass("active");
            $("#" + tab).addClass("active");
        });

        const galleries = @json($highlightGalleries);
        let popupSwiper = new Swiper(".popupSlider", {
            loop: false,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev"
            }
        });

        $(".view-btn").click(function() {
            let galleryName = $(this).data("gallery");
            let index = Number($(this).data("index"));
            let images = galleries[galleryName] || [];

            if (!images.length) {
                return;
            }

            popupSwiper.removeAllSlides();

            images.forEach(function(img) {
                popupSwiper.appendSlide(
                    '<div class="swiper-slide">' +
                    '<img src="' + img + '" alt="Event gallery image">' +
                    '</div>'
                );
            });

            popupSwiper.update();
            popupSwiper.slideTo(index, 0);

            let modal = new bootstrap.Modal(document.getElementById("galleryModal"));
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
