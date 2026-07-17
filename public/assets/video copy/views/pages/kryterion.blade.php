@extends('layouts.app')

@section('title', 'Kryterion | Career Website')
@section('body_class', 'kry-page')

@section('content')
<section class="top-banner">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <div class="sm-box">
                                    <p>Providing Smarter</p>
                                    <h1>Testing Solutions</h1>
                                    <ul>
                                        <li>
                                            Benefit from our online test development tools and
                                        </li>
                                        <li>
                                            best practices methodologies to quickly and cost
                                        </li>
                                        <li>
                                            effectively develop high-quality certif-cation programs
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="tb-text">
                                    <h3>
                                        Kryterion Testing<br>
                                        Center | Pakistan
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="feature-box">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <h2>Featured</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="box">
                                    <img src="{{ asset('assets/images/icon31.svg') }}" alt="">
                                    <h3>Online Proctoring</h3>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="box">
                                    <img src="{{ asset('assets/images/icon31.svg') }}" alt="">
                                    <h3>Onsite Proctoring</h3>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="box">
                                    <img src="{{ asset('assets/images/icon31.svg') }}" alt="">
                                    <h3>Account & Scheduling</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="se-area">
                    <div class="container">
                        <div class="form-block">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h2>Schedule your exam</h2>
                                </div>
                            </div>
                            <form class="row g-3" action="#">
                                <div class="col-md-4">
                                    <input type="text" class="form-control" placeholder="Enter Exam Title">
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" placeholder="Exam Code">
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" placeholder="Full Name">
                                </div>
                                <div class="col-md-4">
                                    <input type="email" class="form-control" placeholder="Email">
                                </div>
                                <div class="col-md-4">
                                    <select id="inputcity" class="form-select">
                                        <option selected>Select City</option>
                                        <option>...</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <input type="date" class="form-control" placeholder="mm/dd/yy">
                                </div>
                                <div class="col-md-12">
                                    <textarea rows="7" class="form-control" placeholder="Message"></textarea>
                                </div>
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn sr-btn">Submit Request</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
                <section class="location-section">
                    <div class="container">
						<div class="row">
							<div class="col-lg-12">
								<h2>All Campuses</h2>
							</div>
						</div>
                        <div class="row g-4">
                            <!-- Left -->
                            <div class="col-lg-6">
                                <div class="location-list">
                                    <div class="location-card active" data-map="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3808.2315463269783!2d73.117695!3d31.41968!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3922686eab09f4f1%3A0x679e30a285de4fb1!2sCareer%20Institute%20-%20Madina%20Town%20Branch!5e1!3m2!1sen!2s!4v1782547783345!5m2!1sen!2s">
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
                                    <div class="location-card" data-map="https://maps.google.com/maps?q=lahore&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed">
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
                                    <div class="location-card" data-map="https://maps.google.com/maps?q=karachi&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed">
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
									<div class="location-card" data-map="https://maps.google.com/maps?q=karachi&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed">
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
									<div class="location-card" data-map="https://maps.google.com/maps?q=karachi&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed">
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
									<div class="location-card" data-map="https://maps.google.com/maps?q=karachi&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed">
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
                                    <iframe id="locationMap" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3808.2315463269783!2d73.117695!3d31.41968!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3922686eab09f4f1%3A0x679e30a285de4fb1!2sCareer%20Institute%20-%20Madina%20Town%20Branch!5e1!3m2!1sen!2s!4v1782547783345!5m2!1sen!2s" loading="lazy">
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
