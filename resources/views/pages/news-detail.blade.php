@extends('layouts.app')
@section('title', ($news->meta_title ?: $news->title).' | Career Website')
@section('meta_description', $news->meta_description ?: \Illuminate\Support\Str::limit(strip_tags($news->content), 160))
@section('meta_keywords', $news->meta_keywords ?? '')
@section('body_class', 'news-page')
@section('content')
<section class="news-bar">
    <h1 class="visually-hidden">{{ $news->title }}</h1>
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="news-info">
                    <div class="img-hold">
                        <img src="{{ $news->image_url }}" alt="{{ $news->title }}" onerror="this.onerror=null;this.src='{{ asset('assets/images/img61.png') }}';">
                    </div>
                    <div class="head-text">
                        <h2>
                            {{ $news->title }}
                        </h2>
                        <a href="#"><img src="{{ asset('assets/images/share.svg') }}" alt="Share">Share</a>
                        <p>
                            {{ $news->subtitle }}
                        </p>
                        <span>
                            <img src="{{ asset('assets/images/icon127.png') }}" alt="Publication date">
                            {{ $news->created_at->format('d-m-Y') }}
                        </span>
                    </div>
                    <div class="mid-area">
                        {!! $news->content !!}
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
                                @forelse ($relatedNews as $post)
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
                            <input type="hidden" name="source" value="Newsletter - News Detail">
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
