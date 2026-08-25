@extends('layouts.app')
@section('title', 'News Page | Career Website')
@section('body_class', 'news-page')
@section('content')
<section class="top-banner">
    <h1 class="visually-hidden">Career Institute News</h1>
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
                    <ul class="nav nav-pills mb-3" role="list">
                        <li class="nav-item">
                            <a class="nav-link @if (! $selectedNewsType) active @endif" href="{{ route('news') }}">All</a>
                        </li>
                        @foreach ($newsTypes as $type)
                            <li class="nav-item">
                                <a class="nav-link @if ($selectedNewsType?->id === $type->id) active @endif" href="{{ route('news', ['type' => $type->slug]) }}">{{ $type->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="news-tabs">
                    <div class="tab-content">
                        <div class="tab-pane fade show active">
                            @if ($featuredNews)
                                <div class="main-box">
                                    <div class="row">
                                        <div class="col-lg-7">
                                            <div class="img-hold">
                                                <img src="{{ $featuredNews->image_url }}" alt="{{ $featuredNews->title }}" onerror="this.onerror=null;this.src='{{ asset('assets/images/img61.png') }}';">
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
                                                        <img src="{{ asset('assets/images/icon127.png') }}" alt="Publication date">
                                                        {{ $featuredNews->created_at->format('d-m-Y') }}
                                                    </span>
                                                    <a href="{{ route('news-detail', $featuredNews->slug) }}" class="btn ra-btn">Read full Article</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <p>No news articles are available for this type yet.</p>
                            @endif
                            <div class="more-bar">
                                <div class="row g-3">
                                    @forelse ($otherNews as $item)
                                        <div class="col-lg-4 col-md-6">
                                            <div class="workshop-card">
                                                <!-- Image -->
                                                <div class="workshop-card__image">
                                                    <img src="{{ $item->image_url }}" alt="{{ $item->title }}" onerror="this.onerror=null;this.src='{{ asset('assets/images/img61.png') }}';">
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
                                                <img src="{{ $post->image_url }}" alt="{{ $post->title }}" onerror="this.onerror=null;this.src='{{ asset('assets/images/img61.png') }}';">
                                            </div>
                                            <div class="text-hold">
                                                <h3>{{ $post->title }}</h3>
                                                <span><img src="{{ asset('assets/images/icon126.png') }}" alt="Publication date"> {{ $post->created_at->format('d-m-Y') }}</span>
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
                                <span>{{ $newsTypes->sum('news_count') }}</span>
                            </li>
                            @forelse ($newsTypes as $type)
                                <li>
                                    <a href="{{ route('news', ['type' => $type->slug]) }}">{{ $type->name }}</a>
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
                @if ($newsItems->hasPages())
                    @php
                        $startPage = max(1, $newsItems->currentPage() - 2);
                        $endPage = min($newsItems->lastPage(), $startPage + 4);
                        $startPage = max(1, $endPage - 4);
                    @endphp
                <nav class="pagination-wrap mt-5" aria-label="News pagination">
                    <ul class="pagination justify-content-center">
                        <li class="page-item @if ($newsItems->onFirstPage()) disabled @endif">
                            <a class="page-link" href="{{ $newsItems->previousPageUrl() ?: '#' }}" @if ($newsItems->onFirstPage()) aria-disabled="true" @endif>
                                <i class="fas fa-chevron-left"></i>
                                Previous
                            </a>
                        </li>
                        @for ($page = $startPage; $page <= $endPage; $page++)
                            <li class="page-item @if ($page === $newsItems->currentPage()) active @endif">
                                <a class="page-link" href="{{ $newsItems->url($page) }}">{{ $page }}</a>
                            </li>
                        @endfor
                        <li class="page-item @if (! $newsItems->hasMorePages()) disabled @endif">
                            <a class="page-link" href="{{ $newsItems->nextPageUrl() ?: '#' }}" @if (! $newsItems->hasMorePages()) aria-disabled="true" @endif>
                                Next
                                <i class="fas fa-chevron-right"></i>
                            </a>
                        </li>
                    </ul>
                </nav>
                @endif
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
