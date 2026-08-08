@extends('layouts.app')
@section('title', 'News Page | Career Website')
@section('body_class', 'news-page')
@section('content')
<section class="top-banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>
                    Latest News
                </h2>
                <p>
                    Stay updated with the latest announcements, events,<br>
                    achievements, and inspiring stories from Career<br>
                    Institute and leading technology companies worldwide.
                </p>
            </div>
        </div>
    </div>
</section>
<section class="news-bar">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="news-tabs">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">All</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Admissions</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Training & Certifications </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-four-tab" data-bs-toggle="pill" data-bs-target="#pills-four" type="button" role="tab" aria-controls="pills-four" aria-selected="false">Career Opportunities</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-five-tab" data-bs-toggle="pill" data-bs-target="#pills-five" type="button" role="tab" aria-controls="pills-five" aria-selected="false">Job Placements</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-six-tab" data-bs-toggle="pill" data-bs-target="#pills-six" type="button" role="tab" aria-controls="pills-six" aria-selected="false">Industry Insights</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-seven-tab" data-bs-toggle="pill" data-bs-target="#pills-seven" type="button" role="tab" aria-controls="pills-seven" aria-selected="false">Tech Trends</button>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="news-tabs">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                            @if ($featuredNews)
                                <div class="main-box">
                                    <div class="row">
                                        <div class="col-lg-7">
                                            <div class="img-hold">
                                                <img src="{{ $featuredNews->image ? asset('storage/'.$featuredNews->image) : asset('assets/images/img62.png') }}" alt="{{ $featuredNews->title }}">
                                                <h4>Featured</h4>
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <div class="t-box">
                                                <h3>
                                                    {{ $featuredNews->title }}
                                                </h3>
                                                <p>
                                                    {{ $featuredNews->subtitle }}
                                                </p>
                                                <div class="last-box">
                                                    <span>
                                                        <img src="{{ asset('assets/images/icon127.png') }}" alt="">
                                                        {{ $featuredNews->created_at->format('d-m-Y') }}
                                                    </span>
                                                    <a href="{{ route('news-detail', $featuredNews->slug) }}" class="btn ra-btn">Read full Article</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="more-bar">
                                <div class="row">
                                    @forelse ($otherNews as $item)
                                        <div class="col-lg-4 col-md-6">
                                            <div class="workshop-card">
                                                <!-- Image -->
                                                <div class="workshop-card__image">
                                                    <img src="{{ $item->image ? asset('storage/'.$item->image) : asset('assets/images/img64.png') }}" alt="{{ $item->title }}">
                                                    <span class="workshop-card__badge">{{ $item->type->name }}</span>
                                                </div>
                                                <!-- Content -->
                                                <div class="workshop-card__body">
                                                    <h3 class="workshop-card__title">
                                                        {{ $item->title }}
                                                    </h3>
                                                    <p class="workshop-card__text">
                                                        {{ $item->subtitle }}
                                                    </p>
                                                    <!-- Bottom -->
                                                    <div class="workshop-card__footer">
                                                        <div class="workshop-card__date">
                                                            <img src="{{ asset('assets/images/icon127.png') }}" alt="Workshop">
                                                            <span>{{ $item->created_at->format('d-m-Y') }}</span>
                                                        </div>
                                                        <a href="{{ route('news-detail', $item->slug) }}" class="workshop-card__btn">
                                                            Read More
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                    @endforelse
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">...</div>
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">...</div>
                        <div class="tab-pane fade" id="pills-four" role="tabpanel" aria-labelledby="pills-four-tab" tabindex="0">...</div>
                        <div class="tab-pane fade" id="pills-five" role="tabpanel" aria-labelledby="pills-five-tab" tabindex="0">...</div>
                        <div class="tab-pane fade" id="pills-six" role="tabpanel" aria-labelledby="pills-six-tab" tabindex="0">...</div>
                        <div class="tab-pane fade" id="pills-seven" role="tabpanel" aria-labelledby="pills-seven-tab" tabindex="0">...</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="rig-bar">
                    <div class="top-box">
                        <div class="new-search">
                            <h2>Search News</h2>
                            <input type="text" class="form-control" placeholder="Search">
                        </div>
                        <div class="rec-post">
                            <h3>Recent Posts</h3>
                            <ul>
                                @forelse ($recentPosts as $post)
                                    <li>
                                        <a href="{{ route('news-detail', $post->slug) }}">
                                            <div class="img-hold">
                                                <img src="{{ $post->image ? asset('storage/'.$post->image) : asset('assets/images/img61.png') }}" alt="{{ $post->title }}">
                                            </div>
                                            <div class="text-hold">
                                                <h3>{{ $post->title }}</h3>
                                                <span><img src="{{ asset('assets/images/icon126.png') }}" alt=""> {{ $post->created_at->format('d-m-Y') }}</span>
                                            </div>
                                        </a>
                                    </li>
                                @empty
                                @endforelse
                            </ul>
                        </div>
                    </div>
                    <div class="bottom-area">
                        <h3>Categories</h3>
                        <ul>
                            <li>
                                <a href="{{ route('news') }}">All News</a>
                                <span>{{ $newsItems->count() }}</span>
                            </li>
                            @forelse ($newsTypes as $type)
                                <li>
                                    <a href="{{ route('news') }}">{{ $type->name }}</a>
                                    <span>{{ $type->news_count }}</span>
                                </li>
                            @empty
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <nav class="pagination-wrap mt-5">
                    <ul class="pagination justify-content-center">
                        <li class="page-item">
                            <a class="page-link" href="#">
                                <i class="fas fa-chevron-left"></i>
                                Previous
                            </a>
                        </li>
                        <li class="page-item active">
                            <a class="page-link" href="#">
                                1
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">
                                2
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">
                                3
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">
                                4
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">
                                5
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">
                                Next
                                <i class="fas fa-chevron-right"></i>
                            </a>
                        </li>
                    </ul>
                </nav>
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
                            <input type="hidden" name="source" value="Newsletter - News">
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </div>
</section>
@endsection
@push('scripts')
@endpush