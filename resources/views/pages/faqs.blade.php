@extends('layouts.app')
@section('title', 'FAQs | Career Website')
@section('body_class', 'faqs-page')
@section('content')
<section class="top-banner">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h3>
                    DO YOU NEED HELP?
                </h3>
                <h1>
                    Frequently Asked Questions
                </h1>
                <div class="form-block">
                    <form action="{{ route('faqs') }}" method="GET">
                        <div class="input-group mb-4">
                            <input type="text" class="form-control sc-iput" name="search" value="{{ $faqSearch }}" placeholder="Search for questions..." aria-describedby="button-addon2">
                            <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><img src="{{ asset('assets/images/icon94.svg') }}" alt="Search courses"></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="faqs-area">
    <div class="container">
        <div class="tabs-bar">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="nav nav-pills" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a href="{{ route('faqs', array_filter(['search' => $faqSearch ?: null])) }}" class="nav-link @if (! $selectedFaqCategory) active @endif">All</a>
                        </li>
                        @foreach ($faqCategories as $category)
                            <li class="nav-item" role="presentation">
                                <a href="{{ route('faqs', array_filter(['category' => $category->slug, 'search' => $faqSearch ?: null])) }}" class="nav-link @if ($selectedFaqCategory?->id === $category->id) active @endif">{{ $category->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <h4>{{ $selectedFaqCategory?->name ?? 'All Categories' }}</h4>
                    @if ($faqSearch !== '')
                        <p style="margin-bottom:18px;color:#667682;">Showing results for "{{ $faqSearch }}".</p>
                    @endif
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" tabindex="0">
                            <div class="accordion">
                                <div class="top-bar">
                                    <h5>{{ $selectedFaqCategory?->name ?? 'All FAQs' }}</h5>
                                    <span>{{ $filteredFaqs->count() }} Question{{ $filteredFaqs->count() === 1 ? '' : 's' }}</span>
                                </div>
                                @include('partials.site-faq-accordion', [
                                    'faqItems' => $filteredFaqs,
                                    'accordionId' => 'faqs-page-accordion',
                                ])
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="rig-bar">
                        <div class="top-box">
                            <div class="new-search">
                                <h2>Search</h2>
                                <form action="{{ route('faqs') }}" method="GET">
                                    @if ($selectedFaqCategory)
                                        <input type="hidden" name="category" value="{{ $selectedFaqCategory->slug }}">
                                    @endif
                                    <input type="text" class="form-control" name="search" value="{{ $faqSearch }}" placeholder="Search">
                                </form>
                            </div>
                        </div>
                        <div class="bottom-area">
                            <h3>Categories</h3>
                            <ul>
                                <li>
                                    <a href="{{ route('faqs', array_filter(['search' => $faqSearch ?: null])) }}" @if (! $selectedFaqCategory) style="font-weight:700;" @endif>All Categories</a>
                                    <span>{{ $totalFaqCount }}</span>
                                </li>
                                @foreach ($faqCategories as $category)
                                    <li>
                                        <a href="{{ route('faqs', array_filter(['category' => $category->slug, 'search' => $faqSearch ?: null])) }}" @if ($selectedFaqCategory?->id === $category->id) style="font-weight:700;" @endif>{{ $category->name }}</a>
                                        <span>{{ $category->faqs_count }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
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
                        <input type="hidden" name="source" value="Courses Enroll">
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
@include('partials.campus-locations')
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
