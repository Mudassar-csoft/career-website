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
                    Stay updated with the latest announcements,<br>
                    events, achievements and stories from Career Institute.
                </p>
            </div>
        </div>
    </div>
</section>
<section class="news-bar">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="news-tabs">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">All</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Admissions</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Announcements</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-four-tab" data-bs-toggle="pill" data-bs-target="#pills-four" type="button" role="tab" aria-controls="pills-four" aria-selected="false">Achievements</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-five-tab" data-bs-toggle="pill" data-bs-target="#pills-five" type="button" role="tab" aria-controls="pills-five" aria-selected="false">Workshops</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                            <div class="main-box">
                                <div class="row">
                                    <div class="col-lg-7">
                                        <div class="img-hold">
                                            <img src="{{ asset('assets/images/img62.png') }}" alt="">
                                            <h4>Featured</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="t-box">
                                            <h3>
                                                Career Institute Signs
                                                Franchise MOU for
                                                Kohinoor FSD Branch
                                            </h3>
                                            <p>
                                                A significant milestone as we expand
                                                our footprint to Faisalabad, bringing
                                                quality education closer to more
                                                students.
                                            </p>
                                            <div class="last-box">
                                                <span>
                                                    <img src="{{ asset('assets/images/icon127.png') }}" alt="">
                                                    09-12-2024
                                                </span>
                                                <a href="#" class="btn ra-btn">Read full Article</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="more-bar">
                                <div class="row mb-4">
                                    <div class="col-lg-4 col-md-6">
                                        <div class="workshop-card">
                                            <!-- Image -->
                                            <div class="workshop-card__image">
                                                <img src="{{ asset('assets/images/img64.png') }}" alt="Workshop">
                                                <span class="workshop-card__badge">Institute</span>
                                            </div>
                                            <!-- Content -->
                                            <div class="workshop-card__body">
                                                <h3 class="workshop-card__title">
                                                    Career Institute Signs Franchise MOU for Kohinoor FSD Branch
                                                </h3>
                                                <p class="workshop-card__text">
                                                    A significant milestone as we expand our footprint to Faisalabad,
                                                    bringing quality education closer to more students.
                                                </p>
                                                <!-- Bottom -->
                                                <div class="workshop-card__footer">
                                                    <div class="workshop-card__date">
                                                        <img src="{{ asset('assets/images/icon127.png') }}" alt="Workshop">
                                                        <span>09-12-2024</span>
                                                    </div>
                                                    <a href="#" class="workshop-card__btn">
                                                        Read More
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="workshop-card">
                                            <!-- Image -->
                                            <div class="workshop-card__image">
                                                <img src="{{ asset('assets/images/img64.png') }}" alt="Workshop">
                                                <span class="workshop-card__badge">Institute</span>
                                            </div>
                                            <!-- Content -->
                                            <div class="workshop-card__body">
                                                <h3 class="workshop-card__title">
                                                    Career Institute Signs Franchise MOU for Kohinoor FSD Branch
                                                </h3>
                                                <p class="workshop-card__text">
                                                    A significant milestone as we expand our footprint to Faisalabad,
                                                    bringing quality education closer to more students.
                                                </p>
                                                <!-- Bottom -->
                                                <div class="workshop-card__footer">
                                                    <div class="workshop-card__date">
                                                        <img src="{{ asset('assets/images/icon127.png') }}" alt="Workshop">
                                                        <span>09-12-2024</span>
                                                    </div>
                                                    <a href="#" class="workshop-card__btn">
                                                        Read More
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="workshop-card">
                                            <!-- Image -->
                                            <div class="workshop-card__image">
                                                <img src="{{ asset('assets/images/img64.png') }}" alt="Workshop">
                                                <span class="workshop-card__badge">Institute</span>
                                            </div>
                                            <!-- Content -->
                                            <div class="workshop-card__body">
                                                <h3 class="workshop-card__title">
                                                    Career Institute Signs Franchise MOU for Kohinoor FSD Branch
                                                </h3>
                                                <p class="workshop-card__text">
                                                    A significant milestone as we expand our footprint to Faisalabad,
                                                    bringing quality education closer to more students.
                                                </p>
                                                <!-- Bottom -->
                                                <div class="workshop-card__footer">
                                                    <div class="workshop-card__date">
                                                        <img src="{{ asset('assets/images/icon127.png') }}" alt="Workshop">
                                                        <span>09-12-2024</span>
                                                    </div>
                                                    <a href="#" class="workshop-card__btn">
                                                        Read More
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-md-6">
                                        <div class="workshop-card">
                                            <!-- Image -->
                                            <div class="workshop-card__image">
                                                <img src="{{ asset('assets/images/img64.png') }}" alt="Workshop">
                                                <span class="workshop-card__badge">Institute</span>
                                            </div>
                                            <!-- Content -->
                                            <div class="workshop-card__body">
                                                <h3 class="workshop-card__title">
                                                    Career Institute Signs Franchise MOU for Kohinoor FSD Branch
                                                </h3>
                                                <p class="workshop-card__text">
                                                    A significant milestone as we expand our footprint to Faisalabad,
                                                    bringing quality education closer to more students.
                                                </p>
                                                <!-- Bottom -->
                                                <div class="workshop-card__footer">
                                                    <div class="workshop-card__date">
                                                        <img src="{{ asset('assets/images/icon127.png') }}" alt="Workshop">
                                                        <span>09-12-2024</span>
                                                    </div>
                                                    <a href="#" class="workshop-card__btn">
                                                        Read More
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="workshop-card">
                                            <!-- Image -->
                                            <div class="workshop-card__image">
                                                <img src="{{ asset('assets/images/img64.png') }}" alt="Workshop">
                                                <span class="workshop-card__badge">Institute</span>
                                            </div>
                                            <!-- Content -->
                                            <div class="workshop-card__body">
                                                <h3 class="workshop-card__title">
                                                    Career Institute Signs Franchise MOU for Kohinoor FSD Branch
                                                </h3>
                                                <p class="workshop-card__text">
                                                    A significant milestone as we expand our footprint to Faisalabad,
                                                    bringing quality education closer to more students.
                                                </p>
                                                <!-- Bottom -->
                                                <div class="workshop-card__footer">
                                                    <div class="workshop-card__date">
                                                        <img src="{{ asset('assets/images/icon127.png') }}" alt="Workshop">
                                                        <span>09-12-2024</span>
                                                    </div>
                                                    <a href="#" class="workshop-card__btn">
                                                        Read More
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="workshop-card">
                                            <!-- Image -->
                                            <div class="workshop-card__image">
                                                <img src="{{ asset('assets/images/img64.png') }}" alt="Workshop">
                                                <span class="workshop-card__badge">Institute</span>
                                            </div>
                                            <!-- Content -->
                                            <div class="workshop-card__body">
                                                <h3 class="workshop-card__title">
                                                    Career Institute Signs Franchise MOU for Kohinoor FSD Branch
                                                </h3>
                                                <p class="workshop-card__text">
                                                    A significant milestone as we expand our footprint to Faisalabad,
                                                    bringing quality education closer to more students.
                                                </p>
                                                <!-- Bottom -->
                                                <div class="workshop-card__footer">
                                                    <div class="workshop-card__date">
                                                        <img src="{{ asset('assets/images/icon127.png') }}" alt="Workshop">
                                                        <span>09-12-2024</span>
                                                    </div>
                                                    <a href="#" class="workshop-card__btn">
                                                        Read More
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">...</div>
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">...</div>
                        <div class="tab-pane fade" id="pills-four" role="tabpanel" aria-labelledby="pills-four-tab" tabindex="0">...</div>
                        <div class="tab-pane fade" id="pills-five" role="tabpanel" aria-labelledby="pills-five-tab" tabindex="0">...</div>
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
                                <li>
                                    <a href="#">
                                        <div class="img-hold">
                                            <img src="{{ asset('assets/images/img61.png') }}" alt="">
                                        </div>
                                        <div class="text-hold">
                                            <h3>Career Institute Signs Franchise MOU for Kohinoor FSD Branch</h3>
                                            <span><img src="{{ asset('assets/images/icon126.png') }}" alt=""> 09-12-2024</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="img-hold">
                                            <img src="{{ asset('assets/images/img61.png') }}" alt="">
                                        </div>
                                        <div class="text-hold">
                                            <h3>Career Institute Signs Franchise MOU for Kohinoor FSD Branch</h3>
                                            <span><img src="{{ asset('assets/images/icon126.png') }}" alt=""> 09-12-2024</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="img-hold">
                                            <img src="{{ asset('assets/images/img61.png') }}" alt="">
                                        </div>
                                        <div class="text-hold">
                                            <h3>Career Institute Signs Franchise MOU for Kohinoor FSD Branch</h3>
                                            <span><img src="{{ asset('assets/images/icon126.png') }}" alt=""> 09-12-2024</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="img-hold">
                                            <img src="{{ asset('assets/images/img61.png') }}" alt="">
                                        </div>
                                        <div class="text-hold">
                                            <h3>Career Institute Signs Franchise MOU for Kohinoor FSD Branch</h3>
                                            <span><img src="{{ asset('assets/images/icon126.png') }}" alt=""> 09-12-2024</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="img-hold">
                                            <img src="{{ asset('assets/images/img61.png') }}" alt="">
                                        </div>
                                        <div class="text-hold">
                                            <h3>Career Institute Signs Franchise MOU for Kohinoor FSD Branch</h3>
                                            <span><img src="{{ asset('assets/images/icon126.png') }}" alt=""> 09-12-2024</span>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="bottom-area">
                        <h3>Categories</h3>
                        <ul>
                            <li>
                                <a href="#">All News</a>
                                <span>36</span>
                            </li>
                            <li>
                                <a href="#">Admission</a>
                                <span>08</span>
                            </li>
                            <li>
                                <a href="#">Events</a>
                                <span>36</span>
                            </li>
                            <li>
                                <a href="#">Announcements</a>
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
                            <li>
                                <a href="#">Scholarships</a>
                                <span>36</span>
                            </li>
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