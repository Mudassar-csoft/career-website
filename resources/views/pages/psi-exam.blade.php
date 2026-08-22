@extends('layouts.app')
@section('title', 'PSI Exam | Career Website')
@section('body_class', 'PSI-page')
@section('content')
<section class="top-banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="sm-box">
                    <h1>PSI<br> Exam Center | Pakistan</h1>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="dis-area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <h2>
                    Discover an easy to use,<br>
                    paperless, and Interactive<br>
                    approach to expedite your<br>
                    examination process.
                </h2>
                <p>
                    We offer a variety of services for Real Estate, Insurance,<br>
                    Construction, Barber, Cosmetology and other<br>
                    professionallicenses and certifications.
                </p>
            </div>
            <div class="col-lg-6">
                <div class="img-hold">
                    <img src="{{ asset('assets/images/img18.png') }}" alt="PSI exam services">
                </div>
            </div>
        </div>
    </div>
</section>
<section class="s-block">
    <div class="container">
        <div class="row mb-4 g-3 g-lg-4">
            <div class="col-lg-4 col-6">
                <div class="box">
                    <div class="img-hold">
                        <img src="{{ asset('assets/images/icon25.svg') }}" alt="Career Institute feature icon">
                    </div>
                    <p>Real Estate</p>
                </div>
            </div>
            <div class="col-lg-4 col-6">
                <div class="box">
                    <div class="img-hold">
                        <img src="{{ asset('assets/images/icon26.svg') }}" alt="Career Institute feature icon">
                    </div>
                    <p>Real Estate</p>
                </div>
            </div>
            <div class="col-lg-4 col-6">
                <div class="box">
                    <div class="img-hold">
                        <img src="{{ asset('assets/images/icon27.svg') }}" alt="Career Institute feature icon">
                    </div>
                    <p>Cosmetology, Manicurist & Barber</p>
                </div>
            </div>
            <div class="col-lg-4 col-6">
                <div class="box">
                    <div class="img-hold">
                        <img src="{{ asset('assets/images/icon28.svg') }}" alt="Career Institute feature icon">
                    </div>
                    <p>Real Estate</p>
                </div>
            </div>
            <div class="col-lg-4 col-6">
                <div class="box">
                    <div class="img-hold">
                        <img src="{{ asset('assets/images/icon29.svg') }}" alt="Career Institute feature icon">
                    </div>
                    <p>Health Care</p>
                </div>
            </div>
            <div class="col-lg-4 col-6">
                <div class="box">
                    <div class="img-hold">
                        <img src="{{ asset('assets/images/icon30.svg') }}" alt="Career Institute feature icon">
                    </div>
                    <p>Information Technology</p>
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
                <input type="hidden" name="source" value="PSI Exam Booking">
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
