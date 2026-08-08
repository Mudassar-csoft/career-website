@extends('layouts.app')
@section('title', 'Blog | Career Website')
@section('body_class', 'blog-page')
@section('content')
<section class="top-banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>
                    Blog
                </h2>
                <p>
                    Insights, guides, and stories from Career Institute to help you<br>
                    learn, grow, and build a successful career.
                </p>
            </div>
        </div>
    </div>
</section>
<section class="blog-area">
    <div class="container">
        <div class="row mb-5">
            @forelse ($blogs as $blog)
                <div class="col-lg-3 col-sm-6 mb-4">
                    <div class="block">
                        <div class="img-hold">
                            <a href="{{ route('blog-detail', $blog->slug) }}">
                                <img src="{{ $blog->image ? asset('storage/'.$blog->image) : asset('assets/images/img13.png') }}" alt="{{ $blog->title }}">
                            </a>
                        </div>
                        <div class="t-bar">
                            <h3>
                                <a href="{{ route('blog-detail', $blog->slug) }}" style="color:inherit;text-decoration:none;">{{ $blog->title }}</a>
                            </h3>
                            <p>
                                {{ $blog->excerpt ?: \Illuminate\Support\Str::limit(strip_tags($blog->content), 90) }}
                            </p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-lg-12">
                    <p>No blog posts published yet. Check back soon.</p>
                </div>
            @endforelse
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
                            <input type="hidden" name="source" value="Newsletter - Blog">
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </div>
</section>
@endsection
