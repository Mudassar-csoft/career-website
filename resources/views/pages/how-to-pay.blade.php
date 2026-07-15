@extends('layouts.app')
@section('title', 'How to Pay | Career Website')
@section('body_class', 'pay-page')
@section('content')
<section class="top-banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>How to Pay</h1>
                <p>
                    Pay quickly and easily with your preferred methods.
                </p>
            </div>
        </div>
    </div>
</section>
<section class="tabs-area">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-12">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">
                        <img src="{{ asset('assets/images/img35.png') }}" alt="">
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">
                        <img src="{{ asset('assets/images/img36.png') }}" alt="">
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="jazz-tab" data-bs-toggle="tab" data-bs-target="#jazz-tab-pane" type="button" role="tab" aria-controls="jazz-tab-pane" aria-selected="false">
                        <img src="{{ asset('assets/images/img43.png') }}" alt="">
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">
                        <img src="{{ asset('assets/images/img37.png') }}" alt="">
                        </button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                        <div class="bank-info">
                            <div class="row g-4">
                                <!-- Bank Name -->
                                <div class="col-lg-6">
                                    <label class="info-label">Bank Name</label>
                                    <div class="info-box">
                                        Meezan Bank
                                    </div>
                                </div>
                                <!-- Account Number -->
                                <div class="col-lg-6">
                                    <label class="info-label">Account Number</label>
                                    <div class="info-box copy-box">
                                        <span>04070106379883</span>
                                        <button class="btn-copy">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor"
                                                class="bi bi-copy" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                    d="M4 1.5H11a1.5 1.5 0 0 1 1.5 1.5V4H11V3a.5.5 0 0 0-.5-.5H4A.5.5 0 0 0 3.5 3v8A.5.5 0 0 0 4 11h1v1.5H4A1.5 1.5 0 0 1 2.5 11V3A1.5 1.5 0 0 1 4 1.5z"/>
                                                <path fill-rule="evenodd"
                                                    d="M6 5.5A1.5 1.5 0 0 1 7.5 4h4A1.5 1.5 0 0 1 13 5.5v7A1.5 1.5 0 0 1 11.5 14h-4A1.5 1.5 0 0 1 6 12.5v-7z"/>
                                            </svg>
                                            Copy
                                        </button>
                                    </div>
                                </div>
                                <!-- Account Title -->
                                <div class="col-12">
                                    <label class="info-label">Account Title</label>
                                    <div class="info-box">
                                        CAREER INSTITUTE (PRIVATE) LIMITED
                                    </div>
                                </div>
                                <!-- Branch Code -->
                                <div class="col-12">
                                    <label class="info-label">Branch Code</label>
                                    <div class="info-box">
                                        0407
                                    </div>
                                </div>
                                <!-- IBAN -->
                                <div class="col-12">
                                    <label class="info-label">IBAN Number</label>
                                    <div class="info-box copy-box">
                                        <span>PK10MEZN0004070106379883</span>
                                        <button class="btn-copy">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor"
                                                class="bi bi-copy" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                    d="M4 1.5H11a1.5 1.5 0 0 1 1.5 1.5V4H11V3a.5.5 0 0 0-.5-.5H4A.5.5 0 0 0 3.5 3v8A.5.5 0 0 0 4 11h1v1.5H4A1.5 1.5 0 0 1 2.5 11V3A1.5 1.5 0 0 1 4 1.5z"/>
                                                <path fill-rule="evenodd"
                                                    d="M6 5.5A1.5 1.5 0 0 1 7.5 4h4A1.5 1.5 0 0 1 13 5.5v7A1.5 1.5 0 0 1 11.5 14h-4A1.5 1.5 0 0 1 6 12.5v-7z"/>
                                            </svg>
                                            Copy
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                        <div class="bank-info">
                            <div class="row g-4">
                                <!-- Bank Name -->
                                <div class="col-lg-12">
                                    <label class="info-label">Bank Name</label>
                                    <div class="info-box">
                                        HBL
                                    </div>
                                </div>
                                <!-- Account Title -->
                                <div class="col-12">
                                    <label class="info-label">Account Title</label>
                                    <div class="info-box">
                                        CAREER INSTITUTE (PRIVATE) LIMITED
                                    </div>
                                </div>
                                <!-- IBAN -->
                                <div class="col-12">
                                    <label class="info-label">IBAN Number</label>
                                    <div class="info-box copy-box">
                                        <span>PK94HABB0002957901554603</span>
                                        <button class="btn-copy">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor"
                                                class="bi bi-copy" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                    d="M4 1.5H11a1.5 1.5 0 0 1 1.5 1.5V4H11V3a.5.5 0 0 0-.5-.5H4A.5.5 0 0 0 3.5 3v8A.5.5 0 0 0 4 11h1v1.5H4A1.5 1.5 0 0 1 2.5 11V3A1.5 1.5 0 0 1 4 1.5z"/>
                                                <path fill-rule="evenodd"
                                                    d="M6 5.5A1.5 1.5 0 0 1 7.5 4h4A1.5 1.5 0 0 1 13 5.5v7A1.5 1.5 0 0 1 11.5 14h-4A1.5 1.5 0 0 1 6 12.5v-7z"/>
                                            </svg>
                                            Copy
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="jazz-tab-pane" role="tabpanel" aria-labelledby="jazz-tab" tabindex="0">
                        <div class="bank-info">
                            <div class="row g-4">
                                <!-- Bank Name -->
                                <div class="col-lg-12">
                                    <label class="info-label">Bank Name</label>
                                    <div class="info-box">
                                        EasyPaisa
                                    </div>
                                </div>
                                <!-- Account Title -->
                                <div class="col-12">
                                    <label class="info-label">Account Title</label>
                                    <div class="info-box">
                                        Muhammad Adeel Javaid
                                    </div>
                                </div>
                                <!-- IBAN -->
                                <div class="col-12">
                                    <label class="info-label">IBAN Number</label>
                                    <div class="info-box copy-box">
                                        <span>03145000083</span>
                                        <button class="btn-copy">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor"
                                                class="bi bi-copy" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                    d="M4 1.5H11a1.5 1.5 0 0 1 1.5 1.5V4H11V3a.5.5 0 0 0-.5-.5H4A.5.5 0 0 0 3.5 3v8A.5.5 0 0 0 4 11h1v1.5H4A1.5 1.5 0 0 1 2.5 11V3A1.5 1.5 0 0 1 4 1.5z"/>
                                                <path fill-rule="evenodd"
                                                    d="M6 5.5A1.5 1.5 0 0 1 7.5 4h4A1.5 1.5 0 0 1 13 5.5v7A1.5 1.5 0 0 1 11.5 14h-4A1.5 1.5 0 0 1 6 12.5v-7z"/>
                                            </svg>
                                            Copy
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
                        <div class="bank-info">
                            <div class="row g-4">
                                <!-- Bank Name -->
                                <div class="col-lg-12">
                                    <label class="info-label">Bank Name</label>
                                    <div class="info-box">
                                        EasyPaisa
                                    </div>
                                </div>
                                <!-- Account Title -->
                                <div class="col-12">
                                    <label class="info-label">Account Title</label>
                                    <div class="info-box">
                                        Muhammad Adeel Javaid
                                    </div>
                                </div>
                                <!-- IBAN -->
                                <div class="col-12">
                                    <label class="info-label">IBAN Number</label>
                                    <div class="info-box copy-box">
                                        <span>03145000083</span>
                                        <button class="btn-copy">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor"
                                                class="bi bi-copy" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                    d="M4 1.5H11a1.5 1.5 0 0 1 1.5 1.5V4H11V3a.5.5 0 0 0-.5-.5H4A.5.5 0 0 0 3.5 3v8A.5.5 0 0 0 4 11h1v1.5H4A1.5 1.5 0 0 1 2.5 11V3A1.5 1.5 0 0 1 4 1.5z"/>
                                                <path fill-rule="evenodd"
                                                    d="M6 5.5A1.5 1.5 0 0 1 7.5 4h4A1.5 1.5 0 0 1 13 5.5v7A1.5 1.5 0 0 1 11.5 14h-4A1.5 1.5 0 0 1 6 12.5v-7z"/>
                                            </svg>
                                            Copy
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <h3><img src="{{ asset('assets/images/icon67.svg') }}" alt=""> Note</h3>
                    <p>
                        Make payments to specified bank accounts through online banking, ATM, or internet banking for your course at <b>Career.edu.pk.</b> After payment, send deposit slip image
                        with Course Name or invoice reference to <b>accounts@career.edu.pk</b> or <b>WhatsApp at 0314-5000083.</b>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('scripts')
<script>
    document.querySelectorAll(".btn-copy").forEach(button => {
                button.addEventListener("click", function () {
                    const text = this.parentElement.querySelector("span").innerText;
                    navigator.clipboard.writeText(text);
                    this.innerHTML = "Copied ✓";
                    setTimeout(() => {
                        this.innerHTML = `
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor"
                                class="bi bi-copy" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M4 1.5H11a1.5 1.5 0 0 1 1.5 1.5V4H11V3a.5.5 0 0 0-.5-.5H4A.5.5 0 0 0 3.5 3v8A.5.5 0 0 0 4 11h1v1.5H4A1.5 1.5 0 0 1 2.5 11V3A1.5 1.5 0 0 1 4 1.5z"/>
                                <path fill-rule="evenodd"
                                    d="M6 5.5A1.5 1.5 0 0 1 7.5 4h4A1.5 1.5 0 0 1 13 5.5v7A1.5 1.5 0 0 1 11.5 14h-4A1.5 1.5 0 0 1 6 12.5v-7z"/>
                            </svg>
                            Copy
                        `;
                    }, 2000);
                });
            });
</script>
@endpush