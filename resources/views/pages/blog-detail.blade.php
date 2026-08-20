@extends('layouts.app')
@section('title', ($blog->meta_title ?: $blog->title).' | Career Website')
@section('meta_description', $blog->meta_description ?: ($blog->excerpt ?: \Illuminate\Support\Str::limit(strip_tags($blog->content), 160)))
@section('meta_keywords', $blog->meta_keywords ?? '')
@section('body_class', 'blog-detail news-page')
@push('styles')
<style>
    .blog-detail .search-form {
        position: relative;
    }
    .blog-detail .search-form .form-control {
        padding-right: 46px;
        background-image: none;
    }
    .blog-detail .search-submit {
        position: absolute;
        top: 50%;
        right: 14px;
        transform: translateY(-50%);
        width: 20px;
        height: 20px;
        padding: 0;
        border: 0;
        background: transparent;
    }
    .blog-detail .search-submit img {
        width: 18px;
        height: 18px;
    }
</style>
@endpush
@section('content')
<section class="news-bar">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="news-info">
                    <div class="img-hold">
                        <img src="{{ $blog->image_url ?: asset('assets/images/img13.png') }}" alt="{{ $blog->title }}" onerror="this.src='{{ asset('assets/images/img13.png') }}'; this.onerror=null;">
                    </div>
                    <div class="head-text">
                        <h2>
                            {{ $blog->title }}
                        </h2>
                        <a href="#"><img src="{{ asset('assets/images/share.svg') }}" alt="">Share</a>
                        @if ($blog->excerpt)
                            <p>
                                {{ $blog->excerpt }}
                            </p>
                        @endif
                        <span>
                            <img src="{{ asset('assets/images/icon127.png') }}" alt="">
                            {{ $blog->created_at->format('d-m-Y') }}
                        </span>
                    </div>
                    <div class="mid-area">
                        {!! $blog->content !!}
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="rig-bar">
                    <div class="top-box">
                        <div class="new-search">
                            <h2>Search Blogs</h2>
                            <form action="{{ route('blogs') }}" method="GET" class="search-form">
                                <input type="text" class="form-control" name="search" value="{{ request('search') }}" placeholder="Search">
                                <button type="submit" class="search-submit" aria-label="Search blogs">
                                    <img src="{{ asset('assets/images/search.svg') }}" alt="">
                                </button>
                            </form>
                        </div>
                        <div class="rec-post">
                            <h3>Recent Posts</h3>
                            <ul>
                                @forelse ($relatedBlogs as $post)
                                    <li>
                                        <a href="{{ route('blog-detail', $post->slug) }}">
                                            <div class="img-hold">
                                                <img src="{{ $post->image_url ?: asset('assets/images/img13.png') }}" alt="{{ $post->title }}" onerror="this.src='{{ asset('assets/images/img13.png') }}'; this.onerror=null;">
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
                            <input type="hidden" name="source" value="Newsletter - Blog Detail">
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </div>
</section>
@endsection
