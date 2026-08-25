@extends('layouts.app')
@section('title', 'Privacy Policy | Career Website')
@section('body_class', 'tc-page')
@section('content')
<section class="top-banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>
                    Term & Conditions
                </h1>
                <p>
                    By accessing and using our website, services, and programs, you agree to follow these Terms & Conditions.<br>
                    If you do not agree with these terms, please discontinue using our services.
                </p>
            </div>
        </div>
    </div>
</section>
<section class="tc-text">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>
                    Terms & Conditions
                </h2>
            </div>
            <div class="col-lg-7">
                <ul>
                    <li>
                        <h4>
                         <img src="{{ asset('assets/images/icon148.png') }}" alt=""> Acceptance of Terms
                        </h4>
                        <p>
                            By accessing and using our website, services, and educational programs, you agree to comply with these Terms & Conditions. If you do not agree with any part of these terms, you should discontinue the use of our services.
                        </p>
                    </li>
                    <li>
                        <h4>
                         <img src="{{ asset('assets/images/icon148.png') }}" alt=""> User Responsibilities
                        </h4>
                        <p>
                            Users are expected to provide accurate and complete information during registration, admission, or inquiry processes. Any misuse of the website or submission of false information may result in restricted access.
                        </p>
                    </li>
                    <li>
                        <h4>
                         <img src="{{ asset('assets/images/icon148.png') }}" alt=""> Fees & Payments
                        </h4>
                        <p>
                            All course fees, registration charges, and related payments must be made according to the institute's payment policies. Fees paid are subject to the applicable refund and cancellation policies.
                        </p>
                    </li>
                    <li>
                        <h4>
                         <img src="{{ asset('assets/images/icon148.png') }}" alt=""> Intellectual Property
                        </h4>
                        <p>
                            All content, materials, logos, designs, and educational resources available on this website are the property of Career Institute and may not be copied, distributed, or reproduced without prior authorization.
                        </p>
                    </li>
                    <li>
                        <h4>
                         <img src="{{ asset('assets/images/icon148.png') }}" alt=""> Admissions & Enrollments
                        </h4>
                        <p>
                            Admission decisions are subject to eligibility requirements, document verification, and program availability. The institute reserves the right to approve or decline applications at its discretion.
                        </p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
@endsection
