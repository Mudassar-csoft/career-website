@extends('layouts.app')
@section('title', 'Contact Career Institute - Get in Touch Today')
@section('body_class', 'contact-page')
@section('content')
<section class="top-banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="sm-box">
                    <h1>Contact Us</h1>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="query-bar">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <h2>
                    <span>
                        Have questions about our courses, admissions, certifications,
                        testing services, coworking spaces, study abroad, or campuses?
                    </span><br>
                    Connect with our team via WhatsApp, phone, email, Webex,
                    Google Meet, or Microsoft Teams at your convenience.
                </h2>
            </div>
        </div>
    </div>
</section>
<section class="info-bar">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
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
                                <img src="{{ asset('assets/images/icon22.svg') }}" alt="Career Institute feature icon">
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
                            <textarea placeholder="Message" class="form-control" rows="9"></textarea>
                        </div>
                        <div class="col-12 text-center mt-4">
                            <button type="submit" class="btn sm-btn">Send Message</button>
                        </div>
                        <input type="hidden" name="source" value="Contact Us">
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
                <h2 class="aos-init aos-animate" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="900">Keep in Touch</h2>
                <ul>
                    <li class="aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom"><a href="https://www.facebook.com/careerinstituteofficial" target="_blank" rel="noopener noreferrer" aria-label="Career Institute on Facebook"><img src="assets/images/fb.png" alt="Facebook"></a></li>
                    <li class="aos-init aos-animate" data-aos="fade-up" data-aos-duration="1100" data-aos-anchor-placement="top-bottom"><a href="https://www.instagram.com/careerinstituteofficial" target="_blank" rel="noopener noreferrer" aria-label="Career Institute on Instagram"><img src="assets/images/instagram.png" alt="Instagram"></a></li>
                    <li class="aos-init aos-animate" data-aos="fade-up" data-aos-duration="1200" data-aos-anchor-placement="top-bottom"><a href="https://www.youtube.com/@CareerInstitutepk" target="_blank" rel="noopener noreferrer" aria-label="Career Institute on YouTube"><img src="assets/images/youtube.png" alt="YouTube"></a></li>
                    <li class="aos-init aos-animate" data-aos="fade-up" data-aos-duration="1300" data-aos-anchor-placement="top-bottom"><a href="https://www.tiktok.com/@careerinstituteofficial" target="_blank" rel="noopener noreferrer" aria-label="Career Institute on TikTok"><img src="assets/images/tiktok.png" alt="TikTok"></a></li>
                    <li class="aos-init aos-animate" data-aos="fade-up" data-aos-duration="1400" data-aos-anchor-placement="top-bottom"><a href="https://www.linkedin.com/company/careerinstituteofficial/" target="_blank" rel="noopener noreferrer" aria-label="Career Institute on LinkedIn"><img src="assets/images/linkdin.png" alt="LinkedIn"></a></li>
                    <li class="aos-init aos-animate" data-aos="fade-up" data-aos-duration="1500" data-aos-anchor-placement="top-bottom"><a href="https://twitter.com/careerofficials" target="_blank" rel="noopener noreferrer" aria-label="Career Institute on X"><img src="assets/images/x.png" alt="X"></a></li>
                    <li class="aos-init aos-animate" data-aos="fade-up" data-aos-duration="1600" data-aos-anchor-placement="top-bottom"><a href="https://wa.me/923144444010" target="_blank" rel="noopener noreferrer" aria-label="Chat with Career Institute on WhatsApp"><img src="assets/images/wp.png" alt="WhatsApp"></a></li>
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
