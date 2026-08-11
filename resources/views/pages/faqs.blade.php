@extends('layouts.app')
@section('title', 'Faqs | Career Website')
@section('body_class', 'faqs-page')
@section('content')
<section class="top-banner">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <h3>
                    DO YOU NEED HELP?
                </h3>
                <h1>
                    Frequently Asked Questions
                </h1>
                <div class="form-block">
                    <form action="#">
                        <div class="input-group mb-4">
                            <input type="text" class="form-control sc-iput" placeholder="Search for questions..." aria-describedby="button-addon2">
                            <button class="btn btn-outline-secondary" type="button" id="button-addon2"><img src="http://127.0.0.1:8000/assets/images/icon94.svg" alt=""></button>
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
                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">All</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Admissions</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Coworking Space</button>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <h4>All Categories</h4>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                            <div class="accordion" id="accordionExample">
                                <div class="top-bar">
                                    <h5>Courses</h5>
                                    <span>8 Questions</span>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            What courses do you offer?
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            We offer a wid      
                                        </div>   
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        1.Introduction to Digital Marketing
                                    </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                    </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        1.Introduction to Digital Marketing
                                    </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">...</div>
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">...</div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="rig-bar">
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
                                    <a href="#">Ai &amp; Data Science</a>
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
                                <img src="{{ asset('assets/images/icon20.svg') }}" alt="">
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
                                <img src="{{ asset('assets/images/icon21.svg') }}" alt="">
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
                                <img src=" {{ asset('assets/images/icon22.svg') }}" alt="">
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
                                <img src="{{ asset('assets/images/icon136.svg') }}" alt="">
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
                                <img src="{{ asset('assets/images/icon137.svg') }}" alt="">
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
                    <form class="row g-3 lead-form" method="POST" action="http://127.0.0.1:8000/subscribe">
                        <input type="hidden" name="_token" value="B7U8NRX8nQ52PyUIBEdtKcVdUVatBmwXEJnZ9Bpk" autocomplete="off">                        <div class="col-md-6">
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
                    <li><a href="#"><img src="{{ asset('assets/images/fb.png') }}" alt=""></a></li>
                    <li><a href="#"><img src="{{ asset('assets/images/instagram.png') }}" alt=""></a></li>
                    <li><a href="#"><img src="{{ asset('assets/images/youtube.png') }}" alt=""></a></li>
                    <li><a href="#"><img src="{{ asset('assets/images/tiktok.png') }}" alt=""></a></li>
                    <li><a href="#"><img src="{{ asset('assets/images/linkdin.png') }}" alt=""></a></li>
                    <li><a href="#"><img src="{{ asset('assets/images/x.png') }}" alt=""></a></li>
                    <li><a href="#"><img src="{{ asset('assets/images/wp.png') }}" alt=""></a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="location-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Our Campuses</h2>
            </div>
        </div>
        <div class="row g-4">
            <!-- Left -->
            <div class="col-lg-6">
                <div class="location-list">
                    <div class="location-card active"
                        data-map="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3808.2315463269783!2d73.117695!3d31.41968!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3922686eab09f4f1%3A0x679e30a285de4fb1!2sCareer%20Institute%20-%20Madina%20Town%20Branch!5e1!3m2!1sen!2s!4v1782547783345!5m2!1sen!2s">
                        <div class="location-icon">
                            <img src="{{ asset('assets/images/icon24.svg') }}" alt="">
                        </div>
                        <div class="location-info">
                            <h5>Career Institute - Madina Town Branch</h5>
                            <p>
                                Career Institute, P-49, Chenab Market, Susan Road, Block Z Madina Town,
                                Faisalabad, 38000, Pakistan
                            </p>
                            <span>
                            0418542950 / 03007662050
                            </span>
                        </div>
                    </div>
                    <div class="location-card"
                        data-map="https://maps.google.com/maps?q=lahore&t=&z=13&ie=UTF8&iwloc=&output=embed">
                        <div class="location-icon">
                            <img src="{{ asset('assets/images/icon24.svg') }}" alt="">
                        </div>
                        <div class="location-info">
                            <h5>Career Institute - Madina Town Branch</h5>
                            <p>
                                Career Institute, P-49, Chenab Market, Susan Road, Block Z Madina Town,
                                Faisalabad, 38000, Pakistan
                            </p>
                            <span>
                            0418542950 / 03007662050
                            </span>
                        </div>
                    </div>
                    <div class="location-card"
                        data-map="https://maps.google.com/maps?q=karachi&t=&z=13&ie=UTF8&iwloc=&output=embed">
                        <div class="location-icon">
                            <img src="{{ asset('assets/images/icon24.svg') }}" alt="">
                        </div>
                        <div class="location-info">
                            <h5>Career Institute - Madina Town Branch</h5>
                            <p>
                                Career Institute, P-49, Chenab Market, Susan Road, Block Z Madina Town,
                                Faisalabad, 38000, Pakistan
                            </p>
                            <span>
                            0418542950 / 03007662050
                            </span>
                        </div>
                    </div>
                    <div class="location-card"
                        data-map="https://maps.google.com/maps?q=karachi&t=&z=13&ie=UTF8&iwloc=&output=embed">
                        <div class="location-icon">
                            <img src="{{ asset('assets/images/icon24.svg') }}" alt="">
                        </div>
                        <div class="location-info">
                            <h5>Career Institute - Madina Town Branch</h5>
                            <p>
                                Career Institute, P-49, Chenab Market, Susan Road, Block Z Madina Town,
                                Faisalabad, 38000, Pakistan
                            </p>
                            <span>
                            0418542950 / 03007662050
                            </span>
                        </div>
                    </div>
                    <div class="location-card"
                        data-map="https://maps.google.com/maps?q=karachi&t=&z=13&ie=UTF8&iwloc=&output=embed">
                        <div class="location-icon">
                            <img src="{{ asset('assets/images/icon24.svg') }}" alt="">
                        </div>
                        <div class="location-info">
                            <h5>Career Institute - Madina Town Branch</h5>
                            <p>
                                Career Institute, P-49, Chenab Market, Susan Road, Block Z Madina Town,
                                Faisalabad, 38000, Pakistan
                            </p>
                            <span>
                            0418542950 / 03007662050
                            </span>
                        </div>
                    </div>
                    <div class="location-card"
                        data-map="https://maps.google.com/maps?q=karachi&t=&z=13&ie=UTF8&iwloc=&output=embed">
                        <div class="location-icon">
                            <img src="{{ asset('assets/images/icon24.svg') }}" alt="">
                        </div>
                        <div class="location-info">
                            <h5>Career Institute - Madina Town Branch</h5>
                            <p>
                                Career Institute, P-49, Chenab Market, Susan Road, Block Z Madina Town,
                                Faisalabad, 38000, Pakistan
                            </p>
                            <span>
                            0418542950 / 03007662050
                            </span>
                        </div>
                    </div>
                    <!-- Aur locations yahan add kar sakte hain -->
                </div>
            </div>
            <!-- Right -->
            <div class="col-lg-6">
                <div class="map-wrapper">
                    <iframe
                        id="locationMap"
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3808.2315463269783!2d73.117695!3d31.41968!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3922686eab09f4f1%3A0x679e30a285de4fb1!2sCareer%20Institute%20-%20Madina%20Town%20Branch!5e1!3m2!1sen!2s!4v1782547783345!5m2!1sen!2s"
                        loading="lazy">
                    </iframe>
                </div>
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
