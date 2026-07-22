@extends('layouts.app')

@section('title', 'Verifications | Career Website')
@section('body_class', 'veri-page')

@section('content')
<section class="top-banner">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <h1>Verifications</h1>
                                <p>
                                    Verify your Certificate, Internship Letter, or Experience Letter by entering<br>
                                    the provided Verification ID.
                                </p>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="tabs-area">
                    <div class="container">
                        <div class="row mb-5 justify-content-center">
                            <div class="col-lg-10">
                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Certification</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Internship Letter</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Experience Letter</button>
                                    </li>
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                                        <div class="row justify-content-center">
                                            <div class="col-lg-6">
                                                <div class="text-info">
                                                    <h2>Verification ID</h2>
                                                    <div class="form-block">
                                                        <form class="row g-3">
                                                            <div class="col-12">
                                                                <input type="text" class="form-control">
                                                            </div>
                                                            <div class="col-12 text-center mt-5">
                                                                <button type="submit" class="btn sm-btn">Verify Now</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">...</div>
                                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">...</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
@endsection

@push('scripts')
@endpush
