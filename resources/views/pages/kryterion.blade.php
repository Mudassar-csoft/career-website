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
            <div class="col-lg-6 d-none d-lg-block">
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
        <div class="row g-3">
            <div class="col-lg-4">
                <div class="box">
                    <img src="{{ asset('assets/images/icon31.svg') }}" alt="Career Institute feature icon">
                    <h3>Secure Testing Environment</h3>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="box">
                    <img src="{{ asset('assets/images/icon31.svg') }}" alt="Career Institute feature icon">
                    <h3>Modern Testing Facilities</h3>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="box">
                    <img src="{{ asset('assets/images/icon31.svg') }}" alt="Career Institute feature icon">
                    <h3>Easy Exam Scheduling</h3>
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
            <form class="row g-3 lead-form" method="POST" action="{{ route('subscribers.store') }}">
                @csrf
                <div class="col-md-4">
                    <input type="text" class="form-control" placeholder="Enter Exam Title">
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control" placeholder="Exam Code">
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control" name="name" placeholder="Full Name">
                </div>
                <div class="col-md-4">
                    <input type="email" class="form-control" name="email" placeholder="Email">
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
                <input type="hidden" name="source" value="Kryterion Booking">
            </form>
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
