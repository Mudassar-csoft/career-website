@extends('layouts.app')
@section('title', 'Blog | Career Website')
@section('body_class', 'blog-page')
@push('styles')
<style>
    .blog-page .search-note {
        margin: 0 0 18px;
        font-size: 14px;
        line-height: 20px;
        color: #5f6b76;
    }
    .blog-page .search-note a {
        color: #009db8;
        font-weight: 600;
    }
    .blog-page .search-form {
        position: relative;
    }
    .blog-page .search-form .form-control {
        padding-right: 46px;
        background-image: none;
    }
    .blog-page .search-submit {
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
    .blog-page .search-submit img {
        width: 18px;
        height: 18px;
    }
</style>
@endpush
@section('content')
<section class="top-banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-xxl-6">
                <h1>
                    Blogs & Articles
                </h1>
                <p>
                    Insights, tutorials, and industry trends to help you learn,<br>
                    grow and advance your career.
                </p>
                <ul>
                    <li>
                        <img src="{{ asset('assets/images/icon146.svg') }}" alt="Career Institute feature icon">
                        High Demand Career Field
                    </li>
                    <li>
                        <img src="{{ asset('assets/images/icon146.svg') }}" alt="Career Institute feature icon">
                        Future-Ready Skills
                    </li>
                    <li>
                        <img src="{{ asset('assets/images/icon146.svg') }}" alt="Career Institute feature icon">
                        Global Career Opportunities
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="blog-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h2>Latest Articles</h2>
                @if ($search !== '')
                    <p class="search-note">
                        Showing results for "{{ $search }}".
                        <a href="{{ route('blogs') }}">Clear search</a>
                    </p>
                @endif
                @forelse ($blogs as $blog)
                    <div class="box">
                        <div class="img-hold">
                            <img src="{{ $blog->image_url ?: asset('assets/images/img69.png') }}" alt="{{ $blog->title }}" onerror="this.src='{{ asset('assets/images/img69.png') }}'; this.onerror=null;">
                        </div>
                        <div class="t-hold">
                            <h3>
                                {{ $blog->title }}
                            </h3>
                            @if ($blog->excerpt)
                                <h5>{{ \Illuminate\Support\Str::limit($blog->excerpt, 90) }}</h5>
                            @endif
                            <a href="{{ route('blog-detail', $blog->slug) }}">Read More</a>
                            <p>{{ $blog->created_at->format('M d, Y') }}</p>
                        </div>
                    </div>
                @empty
                    <p>No blog posts match your search right now.</p>
                @endforelse
                @if ($blogs->hasPages())
                    @php
                        $startPage = max(1, $blogs->currentPage() - 2);
                        $endPage = min($blogs->lastPage(), $blogs->currentPage() + 2);
                    @endphp
                    <nav class="pagination-wrap mt-4">
                        <ul class="pagination justify-content-center">
                            <li class="page-item @if ($blogs->onFirstPage()) disabled @endif">
                                <a class="page-link" href="{{ $blogs->onFirstPage() ? '#' : $blogs->previousPageUrl() }}">
                                    <i class="fas fa-chevron-left"></i>
                                    Previous
                                </a>
                            </li>
                            @foreach ($blogs->getUrlRange($startPage, $endPage) as $page => $url)
                                <li class="page-item @if ($page === $blogs->currentPage()) active @endif">
                                    <a class="page-link" href="{{ $url }}">
                                        {{ $page }}
                                    </a>
                                </li>
                            @endforeach
                            <li class="page-item @if (! $blogs->hasMorePages()) disabled @endif">
                                <a class="page-link" href="{{ $blogs->hasMorePages() ? $blogs->nextPageUrl() : '#' }}">
                                    Next
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                @endif
            </div>
            <div class="col-lg-4">
                <div class="rig-bar">
                    <div class="top-box">
                        <div class="new-search">
                            <h2>Search Blogs</h2>
                            <form action="{{ route('blogs') }}" method="GET" class="search-form">
                                <input type="text" class="form-control" name="search" value="{{ $search }}" placeholder="Search">
                                <button type="submit" class="search-submit" aria-label="Search blogs">
                                    <img src="{{ asset('assets/images/search.svg') }}" alt="Search">
                                </button>
                            </form>
                        </div>
                        <div class="rec-post">
                            <h3>Popular Articles</h3>
                            <ul>
                                @forelse ($popularBlogs as $popular)
                                    <li>
                                        <a href="{{ route('blog-detail', $popular->slug) }}">
                                            <div class="img-hold">
                                                <img src="{{ $popular->image_url ?: asset('assets/images/img69.png') }}" alt="{{ $popular->title }}" onerror="this.src='{{ asset('assets/images/img69.png') }}'; this.onerror=null;">
                                            </div>
                                            <div class="text-hold">
                                                <h3>{{ $popular->title }}</h3>
                                                <span><img src="{{ asset('assets/images/icon126.png') }}" alt="Publication date"> {{ $popular->created_at->format('d-m-Y') }}</span>
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
                                <a href="#">All Categories</a>
                                <span>36</span>
                            </li>
                            <li>
                                <a href="#">Design</a>
                                <span>08</span>
                            </li>
                            <li>
                                <a href="#">Web Development</a>
                                <span>36</span>
                            </li>
                            <li>
                                <a href="#">Ai & Data Science</a>
                                <span>36</span>
                            </li>
                            <li>
                                <a href="#">Achievements</a>
                                <span>36</span>
                            </li>
                            <li>
                                <a href="#">Workshops</a>
                                <span>36</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="info-bar">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
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
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <h2>
                    Request a Free Career Counseling Session
                </h2>
                <h5>
                    We offer a complimentary, no-obligation career counseling session to learn about your aspirations and help
                    you map out your path to success.
                </h5>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 mb-4">
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
                                <img src=" {{ asset('assets/images/icon22.svg') }}" alt="Career Institute feature icon">
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
                    <p>
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
                            <textarea placeholder="Questions &amp; Quires" class="form-control" rows="9"></textarea>
                        </div>
                        <div class="col-12 text-center mt-4">
                            <button type="submit" class="btn sm-btn">Send Message</button>
                        </div>
                        <input type="hidden" name="source" value="Blog Contact">
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
                    <li><a href="#"><img src="{{ asset('assets/images/tiktok.png') }}" alt="TikTok"></a></li>
                    <li><a href="https://www.linkedin.com/company/careerinstituteofficial/" target="_blank" rel="noopener noreferrer" aria-label="Career Institute on LinkedIn"><img src="{{ asset('assets/images/linkdin.png') }}" alt="LinkedIn"></a></li>
                    <li><a href="https://twitter.com/careerofficials" target="_blank" rel="noopener noreferrer" aria-label="Career Institute on X"><img src="{{ asset('assets/images/x.png') }}" alt="X"></a></li>
                    <li><a href="https://wa.me/923144444010" target="_blank" rel="noopener noreferrer" aria-label="Chat with Career Institute on WhatsApp"><img src="{{ asset('assets/images/wp.png') }}" alt="WhatsApp"></a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
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
@endpush
