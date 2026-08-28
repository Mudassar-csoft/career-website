@extends('layouts.app')

@section('title', 'Verifications | Career Website')
@section('body_class', 'veri-page')

@php($verificationEmail = config('lead-recipients.addresses.verifications'))

@section('content')
<section class="top-banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>Verifications</h1>
                <p>
                    Verify your Certificate, Diploma, Internship Letter, or Experience<br>
                    Letter by entering the provided Verification ID.
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
                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Diploma</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Internship Letter</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-four-tab" data-bs-toggle="pill" data-bs-target="#pills-four" type="button" role="tab" aria-controls="pills-four" aria-selected="false">Experience Letter</button>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="text-info">
                                    <h2>Verification ID</h2>
                                    <div class="form-block">
                                        <form class="row g-3" id="certificate-verification-form" novalidate>
                                            <div class="col-12">
                                                <label class="visually-hidden" for="roll_number">Verification ID</label>
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    id="roll_number"
                                                    name="verification_id"
                                                    placeholder="Enter your verification ID"
                                                    autocomplete="off"
                                                    required
                                                >
                                            </div>
                                            <div class="col-12 text-center mt-4 mt-xxl-5">
                                                <a href="#"  class="btn sm-btn" id="submit_Button" data-bs-toggle="modal" data-bs-target="#verified-modal">Verify Now</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">...</div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">...</div>
                    <div class="tab-pane fade" id="pills-four" role="tabpanel" aria-labelledby="pills-four-tab" tabindex="0">...</div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('partials.campus-locations')

<div class="modal fade career-model" id="verificationResultModal" tabindex="-1" aria-labelledby="verificationResultTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="verificationResultTitle"> <img src="assets/images/icon149.svg" alt=""> Enter Your Verification ID</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="verificationResultBody">
                <p>
                    Please enter your Verification ID to proceed with the verification.
                </p>
                <p>
                    Please contact the administration of Career Institute for assistance.
                </p>
                <div class="box">
                    <ul>
                        <li>
                            <i class="fas fa-envelope"></i>
                            <a href="mailto:mailto:verifications@career.edu.pk">Email: verifications@career.edu.pk</a>
                        </li>
                        <li>
                            <i class="fas fa-phone-alt"></i>
                            <a href="mailto:tel:+923144444010">Call: +92-314-4444010</a>
                        </li>
                    </ul>
                </div>
                <h4>
                    <i class="fas fa-info-circle"></i>
                    We are here to help you resolve the issue as soon as possible.
                </h4>
            </div>
        </div>
    </div>
</div>

<div class="modal fade career-model" id="not-verified-modal" tabindex="-1" aria-labelledby="verificationResultTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="verificationResultTitle"> <img src="assets/images/icon150.svg" alt="">Certificate Not Verified</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="verificationResultBody">
                <p>
                    <i class="fas fa-times-circle"></i> No matching records found for the provided Verification ID.
                </p>
                <p>
                    Please contact the administration of Career Institute for assistance.
                </p>
                <div class="box">
                    <ul>
                        <li>
                            <i class="fas fa-envelope"></i>
                            <a href="mailto:mailto:verifications@career.edu.pk">Email: verifications@career.edu.pk</a>
                        </li>
                        <li>
                            <i class="fas fa-phone-alt"></i>
                            <a href="mailto:tel:+923144444010">Call: +92-314-4444010</a>
                        </li>
                    </ul>
                </div>
                <h4>
                    <i class="fas fa-info-circle"></i>
                    We are here to help you resolve the issue as soon as possible.
                </h4>
            </div>
        </div>
    </div>
</div>

<div class="modal fade career-model" id="verified-modal" tabindex="-1" aria-labelledby="verificationResultTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="verificationResultTitle"> <img src="assets/images/icon151.svg" alt="">Certificate Verified Successfully!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="verificationResultBody">
                <ul>
                    <li>
                        <p>
                            <i class="fas fa-user"></i> Name
                        </p>
                        <p>
                            Iqra ata Muhammad
                        </p>
                    </li>
                    <li>
                        <p>
                            <i class="fas fa-users"></i> Guardian Name
                        </p>
                        <p>
                            Atta Muhammad
                        </p>
                    </li>
                    <li>
                        <p>
                            <i class="far fa-credit-card"></i> Roll Number
                        </p>
                        <p>
                            CIFSD04-GRD010-26-03
                        </p>
                    </li>
                    <li>
                        <p>
                            <i class="fas fa-book-open"></i> Course Completed
                        </p>
                        <p>
                            Graphics Designing
                        </p>
                    </li>
                    <li>
                        <p>
                            <i class="fas fa-calendar-minus"></i> Course Duration
                        </p>
                        <p>
                            2-Months
                        </p>
                    </li>
                </ul>
                <div class="b-box">
                    <h4>
                        <i class="fas fa-heart"></i>
                        Congratulations, Iqra ata Muhammad!
                    </h4>
                    <p>
                        Your certificate has been successfully verified.
                    </p>
                    <p>
                        For further information call us at :+92-314-4444010
                    </p>
                </div>
                
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
{{-- <script>
    (() => {
        const form = document.getElementById('certificate-verification-form');
        const input = document.getElementById('roll_number');
        const submitButton = document.getElementById('submit_Button');
        const title = document.getElementById('verificationResultTitle');
        const body = document.getElementById('verificationResultBody');
        const modal = new bootstrap.Modal(document.getElementById('verificationResultModal'));
        const supportDetails = [
            'Please contact the administration of Career Institute for assistance.',
            @json('Email: '.$verificationEmail),
            'Call: +92-314-4444010',
            'We are here to help you resolve the issue as soon as possible.',
        ];

        function addParagraph(container, text, strongText = '') {
            const paragraph = document.createElement('p');

            if (strongText) {
                const strong = document.createElement('strong');
                strong.textContent = strongText;
                paragraph.append(strong, document.createTextNode(` ${text}`));
            } else {
                paragraph.textContent = text;
            }

            container.appendChild(paragraph);
        }

        function showFailure(message, heading = 'Certificate Not Verified') {
            title.textContent = heading;
            body.replaceChildren();
            addParagraph(body, message);

            supportDetails.forEach((detail) => addParagraph(body, detail));
            modal.show();
        }

        function showSuccess(response) {
            title.textContent = 'Certificate Verified Successfully!';
            body.replaceChildren();

            const fields = [
                ['Name:', response.name],
                ...(Number(response.M) === 2 ? [['Guardian Name:', response.guardian_name]] : []),
                ['Roll Number:', response.roll_number],
                ['Course Completed:', response.course_completed],
                ['Course Duration:', response.course_duration],
            ];

            fields.forEach(([label, value]) => addParagraph(body, value || 'Not available', label));
            addParagraph(body, `Congratulations, ${response.name || 'student'}! Your certificate has been successfully verified.`);
            addParagraph(body, 'Thank you for being a part of Career Institute. We wish you the best in your future endeavors!');
            modal.show();
        }

        form.addEventListener('submit', async (event) => {
            event.preventDefault();
            const verificationId = input.value.trim();

            if (!verificationId) {
                showFailure('Please enter your Verification ID to proceed with the verification.', 'Enter Your Verification ID');
                input.focus();
                return;
            }

            submitButton.disabled = true;
            submitButton.textContent = 'Verifying...';

            try {
                const response = await fetch(`https://ims.career.edu.pk/api/verify-certificate/${encodeURIComponent(verificationId)}`, {
                    headers: { Accept: 'application/json' },
                });
                const data = await response.json().catch(() => ({}));

                if (response.ok && data.status === 'success') {
                    showSuccess(data);
                } else {
                    showFailure(data.message || 'Unfortunately, your certificate could not be verified.');
                }
            } catch (error) {
                showFailure('Unfortunately, your certificate could not be verified. Please try again later.');
            } finally {
                submitButton.disabled = false;
                submitButton.textContent = 'Verify Now';
            }
        });
    })();
</script> --}}
@endpush
