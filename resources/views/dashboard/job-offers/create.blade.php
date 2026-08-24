@extends('dashboard.layout')
@section('title', 'Add Job Offer | Dashboard')
@section('topbar-actions')
    <a href="{{ route('dashboard.job-offers.index') }}" class="dash-btn dash-btn-secondary">&larr; All Job Offers</a>
@endsection
@section('content')
    <div class="dash-page">
        <div class="dash-page-header"><h2>Add Job Offer</h2></div>
        <div class="dash-form-box">
            <form action="{{ route('dashboard.job-offers.store') }}" method="POST">
                @include('dashboard.job-offers._form', ['jobOffer' => $jobOffer])
                <button type="submit" class="dash-btn">Publish Job Offer</button>
            </form>
        </div>
    </div>
@endsection
