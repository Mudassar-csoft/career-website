@extends('layouts.app')
@section('title', 'Job Placement | Career Website')
@section('body_class', 'job-page')
@section('content')
<section class="top-banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <p class="mb-3">Transform Your Future</p>
                <h1 class="mb-4">Discover Opportunities That Inspire !</h1>
                <div class="btn-block">
                    <a href="#" class="btn aq-btn">Submit Resume</a>
                    <a href="#" class="btn wa-btn">Post a Job</a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="f-job">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2><img src="{{ asset('assets/images/icon52.png') }}" alt="Find Jobs"> Find Jobs</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="career-section">
                    <div class="career-filter">
                        <div class="show-box">
                            05 Show
                        </div>
                        <div class="filter-box">
                            <div class="row g-2">
                                <div class="col-lg">
                                    <input type="text" class="form-control" placeholder="Search Keyword...">
                                </div>
                                <div class="col-lg">
                                    <input type="text" class="form-control" placeholder="Job Type...">
                                </div>
                                <div class="col-lg">
                                    <input type="text" class="form-control" placeholder="Search Location">
                                </div>
                                <div class="col-auto d-none d-lg-block">
                                    <button class="search-btn">
                                        <img src="{{ asset('assets/images/icon53.png') }}" alt="Career Institute feature icon">
                                    </button>
                                </div>
                                <div class="col-12 d-lg-none">
                                    <button class="search-btn">
                                        <img src="{{ asset('assets/images/icon53.png') }}" alt="Career Institute feature icon">
                                        Search
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table career-table">
                            <thead>
                                <tr>
                                    <th>Job Title</th>
                                    <th>Job Posted on</th>
                                    <th>Type</th>
                                    <th>Location</th>
                                    <th>Dead Line</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Graphic Designer</td>
                                    <td>02-04-2026</td>
                                    <td>
                                        <span class="job-badge">
                                            Full Time
                                        </span>
                                    </td>
                                    <td>Faisalabad</td>
                                    <td>02-04-2026</td>
                                    <td>
                                        <a href="#" class="apply-btn">
                                            Apply Now
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>UI/UX Designer</td>
                                    <td>02-04-2026</td>
                                    <td>
                                        <span class="job-badge">
                                            Full Time
                                        </span>
                                    </td>
                                    <td>Faisalabad</td>
                                    <td>02-04-2026</td>
                                    <td>
                                        <a href="#" class="apply-btn">
                                            Apply Now
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Full Stack Digital Marketer</td>
                                    <td>02-04-2026</td>
                                    <td>
                                        <span class="job-badge">
                                            Full Time
                                        </span>
                                    </td>
                                    <td>Faisalabad</td>
                                    <td>02-04-2026</td>
                                    <td>
                                        <a href="#" class="apply-btn">
                                            Apply Now
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Full Stack Web Developer</td>
                                    <td>02-04-2026</td>
                                    <td>
                                        <span class="job-badge">
                                            Full Time
                                        </span>
                                    </td>
                                    <td>Faisalabad</td>
                                    <td>02-04-2026</td>
                                    <td>
                                        <a href="#" class="apply-btn">
                                            Apply Now
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Microsoft Office Manager</td>
                                    <td>02-04-2026</td>
                                    <td>
                                        <span class="job-badge">
                                            Full Time
                                        </span>
                                    </td>
                                    <td>Faisalabad</td>
                                    <td>02-04-2026</td>
                                    <td>
                                        <a href="#" class="apply-btn">
                                            Apply Now
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- <section class="top-banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Transform Your Future</h2>
                <h1>Discover Opportunities That Inspire !</h1>
                <div class="btn-bar">
                    <a href="#" class="btn sr-btn">Submit Resume</a>
                    <a href="#" class="btn pj-btn">Post a Job</a>
                </div>
            </div>
        </div>
    </div>
</section> --}}
<section class="cata-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Explore Job Categories</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <ul>
                    <li>
                        <div class="box">
                            <div class="img-hold">
                                <img src="{{ asset('assets/images/icon48.svg') }}" alt="Career Institute feature icon">
                            </div>
                            <p>
                                Administration<br>
                                Services
                            </p>
                        </div>
                    </li>
                    <li>
                        <div class="box">
                            <div class="img-hold">
                                <img src="{{ asset('assets/images/icon49.svg') }}" alt="Career Institute feature icon">
                            </div>
                            <p>
                                Information<br>
                                Technology
                            </p>
                        </div>
                    </li>
                    <li>
                        <div class="box">
                            <div class="img-hold">
                                <img src="{{ asset('assets/images/icon50.svg') }}" alt="Career Institute feature icon">
                            </div>
                            <p>
                                Marketing<br>
                                Strategy
                            </p>
                        </div>
                    </li>
                    <li>
                        <div class="box">
                            <div class="img-hold">
                                <img src="{{ asset('assets/images/icon51.svg') }}" alt="Career Institute feature icon">
                            </div>
                            <p>
                                Finance &<br>
                                Accounting
                            </p>
                        </div>
                    </li>
                </ul>
                <ul>
                    <li>
                        <div class="box">
                            <div class="img-hold">
                                <img src="{{ asset('assets/images/icon48.svg') }}" alt="Career Institute feature icon">
                            </div>
                            <p>
                                Administration<br>
                                Services
                            </p>
                        </div>
                    </li>
                    <li>
                        <div class="box">
                            <div class="img-hold">
                                <img src="{{ asset('assets/images/icon49.svg') }}" alt="Career Institute feature icon">
                            </div>
                            <p>
                                Information<br>
                                Technology
                            </p>
                        </div>
                    </li>
                    <li>
                        <div class="box">
                            <div class="img-hold">
                                <img src="{{ asset('assets/images/icon50.svg') }}" alt="Career Institute feature icon">
                            </div>
                            <p>
                                Marketing<br>
                                Strategy
                            </p>
                        </div>
                    </li>
                    <li>
                        <div class="box">
                            <div class="img-hold">
                                <img src="{{ asset('assets/images/icon51.svg') }}" alt="Career Institute feature icon">
                            </div>
                            <p>
                                Finance &<br>
                                Accounting
                            </p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="btn-bar">
                    <a href="#" class="btn va-btn">View All</a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="info-bar">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>
                    Discover your Ideal Job or Resource with us !
                </h2>
                <h5>
                    we connect talented professionals with exciting career opportunities across various industries. Our comprehensive<br>
                    resources and job listings are tailored to help you find the perfect fit for your skills and aspirations.
                </h5>
            </div>
        </div>
        <div class="row align-items-center">
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
                            <input type="text" class="form-control" name="phone" placeholder="Contact No">
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Your Linkedin Profile URL">
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="College/University">
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="City">
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Qulification">
                        </div>
                        <div class="col-md-6">
                            <div class="file-upload-wrapper">
                                <div class="input-group custom-file-upload">
                                    <label class="input-group-text" for="fileUpload">
                                        Choose File
                                    </label>
                                    <input type="file" class="form-control d-none" id="fileUpload">
                                    <span class="form-control file-text">
                                        Upload your Document
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-4">
                            <button type="submit" class="btn sm-btn">Send Message</button>
                        </div>
                        <input type="hidden" name="source" value="Job Placement">
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
