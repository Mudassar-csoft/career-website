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
    .blog-detail .blog-image-slider {
        margin-bottom: 20px;
    }
    .blog-detail .blog-image-slide img {
        aspect-ratio: 16 / 9;
        border-radius: 20px;
        display: block;
        object-fit: cover;
        width: 100%;
    }
    .blog-detail .blog-image-slider .slick-prev,
    .blog-detail .blog-image-slider .slick-next {
        z-index: 1;
    }
    .blog-detail .blog-image-slider .slick-prev { left: 18px; }
    .blog-detail .blog-image-slider .slick-next { right: 18px; }
    .blog-detail .blog-image-slider .slick-dots {
        bottom: 12px;
    }
    .blog-detail .blog-image-slider .slick-dots li button:before {
        color: #fff;
        font-size: 10px;
        opacity: 0.75;
    }
    .blog-detail .blog-image-slider .slick-dots li.slick-active button:before {
        color: #03c587;
        opacity: 1;
    }
    .blog-detail .blog-rich-content {
        color: #000;
        font-size: 20px;
        line-height: 1.55;
    }
    .blog-detail .blog-rich-content h1,
    .blog-detail .blog-rich-content h2,
    .blog-detail .blog-rich-content h3,
    .blog-detail .blog-rich-content h4,
    .blog-detail .blog-rich-content h5,
    .blog-detail .blog-rich-content h6 {
        color: #012e4b;
        font-weight: 700;
        line-height: 1.25;
        margin: 1.5em 0 0.65em;
    }
    .blog-detail .blog-rich-content h1 { font-size: 2em; }
    .blog-detail .blog-rich-content h2 { font-size: 1.65em; }
    .blog-detail .blog-rich-content h3 { font-size: 1.35em; }
    .blog-detail .blog-rich-content h4 { font-size: 1.15em; }
    .blog-detail .blog-rich-content p {
        margin: 0 0 1.25em;
    }
    .blog-detail .blog-rich-content ul,
    .blog-detail .blog-rich-content ol {
        margin: 0 0 1.25em;
        padding-left: 1.5em;
    }
    .blog-detail .blog-rich-content ul { list-style: disc; }
    .blog-detail .blog-rich-content ol { list-style: decimal; }
    .blog-detail .blog-rich-content li {
        display: list-item !important;
        list-style: inherit;
        margin: 0 0 0.45em;
        padding: 0;
    }
    .blog-detail .blog-rich-content ul > li {
        list-style-type: disc !important;
    }
    .blog-detail .blog-rich-content ol > li {
        list-style-type: decimal !important;
    }
    .blog-detail .blog-rich-content li > ul,
    .blog-detail .blog-rich-content li > ol {
        margin: 0.45em 0 0;
    }
    .blog-detail .blog-rich-content a {
        color: #009db8;
        text-decoration: underline;
    }
    .blog-detail .blog-rich-content blockquote {
        border-left: 4px solid #03c587;
        color: #425466;
        font-style: italic;
        margin: 0 0 1.25em;
        padding: 0.5em 0 0.5em 1em;
    }
    .blog-detail .blog-rich-content figure.table {
        margin: 0 0 1.25em;
        max-width: 100%;
        overflow-x: auto;
    }
    .blog-detail .blog-rich-content table {
        border-collapse: collapse;
        width: 100%;
    }
    .blog-detail .blog-rich-content th,
    .blog-detail .blog-rich-content td {
        border: 1px solid #cbd5dc;
        padding: 0.6em 0.75em;
        text-align: left;
    }
    .blog-detail .blog-rich-content th {
        background: #eff8f5;
        font-weight: 700;
    }
    .blog-detail .blog-rich-content img,
    .blog-detail .blog-rich-content video {
        height: auto;
        max-width: 100%;
    }
    @media (max-width: 450px) {
        .blog-detail .blog-rich-content {
            font-size: 16px;
        }
    }
</style>
@endpush
@section('content')
<section class="news-bar">
    <h1 class="visually-hidden">{{ $blog->title }}</h1>
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="news-info">
                    <div class="blog-image-slider" data-slide-count="{{ $blog->images->count() }}">
                        @forelse ($blog->images as $image)
                            <div class="blog-image-slide">
                                <img src="{{ $image->image_url }}" alt="{{ $blog->title }}" onerror="this.src='{{ asset('assets/images/img13.png') }}'; this.onerror=null;">
                            </div>
                        @empty
                            <div class="blog-image-slide">
                                <img src="{{ $blog->image_url ?: asset('assets/images/img13.png') }}" alt="{{ $blog->title }}" onerror="this.src='{{ asset('assets/images/img13.png') }}'; this.onerror=null;">
                            </div>
                        @endforelse
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
                    <div class="mid-area blog-rich-content">
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

@push('scripts')
<script>
    $(function () {
        var slider = $('.blog-image-slider');

        if (slider.length && parseInt(slider.data('slide-count'), 10) > 1) {
            slider.slick({
                arrows: true,
                dots: true,
                infinite: true,
                adaptiveHeight: false,
            });
        }
    });
</script>
@endpush
