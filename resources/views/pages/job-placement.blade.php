@extends('layouts.app')

@section('title', 'Job Placement | Career Website')
@section('body_class', 'job-page')

@section('content')
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
                                <div class="col-auto">
                                    <button class="search-btn">
                                        <img src="{{ asset('assets/images/icon53.png') }}" alt="">
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
                                <img src="{{ asset('assets/images/icon48.svg') }}" alt="">
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
                                <img src="{{ asset('assets/images/icon49.svg') }}" alt="">
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
                                <img src="{{ asset('assets/images/icon50.svg') }}" alt="">
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
                                <img src="{{ asset('assets/images/icon51.svg') }}" alt="">
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
                                <img src="{{ asset('assets/images/icon48.svg') }}" alt="">
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
                                <img src="{{ asset('assets/images/icon49.svg') }}" alt="">
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
                                <img src="{{ asset('assets/images/icon50.svg') }}" alt="">
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
                                <img src="{{ asset('assets/images/icon51.svg') }}" alt="">
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
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="box">
                            <div class="img-hold">
                                <img src="{{ asset('assets/images/icon20.svg') }}" alt="">
                            </div>
                            <div class="t-bar">
                                <h3>Call Us Today</h3>
                                <p>0341-4444010</p>
                                <p>0341-4444010</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="box">
                            <div class="img-hold">
                                <img src="{{ asset('assets/images/icon21.svg') }}" alt="">
                            </div>
                            <div class="t-bar">
                                <h3>Email</h3>
                                <p>info@career.edu.pk</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="box">
                            <div class="img-hold">
                                <img src="{{ asset('assets/images/icon22.svg') }}" alt="">
                            </div>
                            <div class="t-bar">
                                <h3>Webex Meetings</h3>
                                <p>Career.pk</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="box">
                            <div class="img-hold">
                                <img src="{{ asset('assets/images/icon23.svg') }}" alt="">
                            </div>
                            <div class="t-bar">
                                <h3>Office Hours</h3>
                                <p>Mon- Sat</p>
                                <p>10:00am-7:00pm</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-block">
                    <form class="row g-3">
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Name">
                        </div>
                        <div class="col-md-6">
                            <input type="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Contact No">
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
                        <div class="col-12 text-center mt-4">
                            <button type="submit" class="btn sm-btn">Send Message</button>
                        </div>
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
