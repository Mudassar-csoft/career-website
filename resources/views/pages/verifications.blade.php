@extends('layouts.app')

@section('title', 'Verifications | Career Website')
@section('body_class', 'veri-page')

@php($verificationEmail = config('lead-recipients.addresses.verifications'))
@php($verificationTabs = [
    ['id' => 'pills-home', 'button_id' => 'pills-home-tab', 'label' => 'Certification'],
    ['id' => 'pills-profile', 'button_id' => 'pills-profile-tab', 'label' => 'Diploma'],
    ['id' => 'pills-contact', 'button_id' => 'pills-contact-tab', 'label' => 'Internship Letter'],
    ['id' => 'pills-four', 'button_id' => 'pills-four-tab', 'label' => 'Experience Letter'],
])

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
                    @foreach ($verificationTabs as $tab)
                        <li class="nav-item" role="presentation">
                            <button
                                class="nav-link {{ $loop->first ? 'active' : '' }}"
                                id="{{ $tab['button_id'] }}"
                                data-bs-toggle="pill"
                                data-bs-target="#{{ $tab['id'] }}"
                                type="button"
                                role="tab"
                                aria-controls="{{ $tab['id'] }}"
                                aria-selected="{{ $loop->first ? 'true' : 'false' }}"
                            >
                                {{ $tab['label'] }}
                            </button>
                        </li>
                    @endforeach
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    @foreach ($verificationTabs as $tab)
                        @php($inputId = 'verification_id_'.$loop->index)
                        <div
                            class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                            id="{{ $tab['id'] }}"
                            role="tabpanel"
                            aria-labelledby="{{ $tab['button_id'] }}"
                            tabindex="0"
                        >
                            <div class="row justify-content-center">
                                <div class="col-lg-6">
                                    <div class="text-info">
                                        <h2>{{ $tab['label'] }} Verification ID</h2>
                                        <div class="form-block">
                                            <form class="row g-3 js-verification-form" novalidate>
                                                <div class="col-12">
                                                    <label class="visually-hidden" for="{{ $inputId }}">Verification ID</label>
                                                    <input
                                                        type="text"
                                                        class="form-control js-verification-id"
                                                        id="{{ $inputId }}"
                                                        name="verification_id"
                                                        placeholder="Enter your verification ID"
                                                        autocomplete="off"
                                                        required
                                                    >
                                                </div>
                                                <div class="col-12 text-center mt-4 mt-xxl-5">
                                                    <button type="submit" class="btn sm-btn js-submit-button">Verify Now</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@include('partials.campus-locations')

<div class="modal fade career-model" id="verificationResultModal" tabindex="-1" aria-labelledby="verificationResultTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header verification-result-header">
                <h2 class="modal-title h5" id="verificationResultTitle"></h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body verification-result-body" id="verificationResultBody"></div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script>
    (() => {
        const forms = document.querySelectorAll('.js-verification-form');
        const title = document.getElementById('verificationResultTitle');
        const body = document.getElementById('verificationResultBody');
        const modal = new bootstrap.Modal(document.getElementById('verificationResultModal'));
        const verificationLookupUrlTemplate = @json(route('verifications.lookup', ['verificationId' => '__VERIFICATION_ID__'], false));
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

        function humanizeKey(key) {
            return key
                .replace(/_/g, ' ')
                .replace(/\b\w/g, (character) => character.toUpperCase());
        }

        function formatValue(value) {
            if (value === null || value === undefined) {
                return '';
            }

            if (Array.isArray(value)) {
                return value.join(', ').trim();
            }

            if (typeof value === 'object') {
                return '';
            }

            return `${value}`.trim();
        }

        function buildFields(response) {
            const fields = [];
            const handledKeys = new Set();
            const preferredFields = [
                ['verification_id', 'Verification ID:'],
                ['roll_number', 'Roll Number:'],
                ['name', 'Name:'],
                ['guardian_name', 'Guardian Name:'],
                ['course_completed', 'Course Completed:'],
                ['course_duration', 'Course Duration:'],
                ['document_type', 'Document Type:'],
                ['certificate_type', 'Certificate Type:'],
                ['issue_date', 'Issue Date:'],
            ];

            preferredFields.forEach(([key, label]) => {
                const value = formatValue(response[key]);

                if (!value) {
                    return;
                }

                fields.push([label, value]);
                handledKeys.add(key);
            });

            Object.entries(response).forEach(([key, value]) => {
                if (handledKeys.has(key) || [
                    'status',
                    'message',
                    'M',
                    'source',
                    'student_status',
                    'student_status_label',
                ].includes(key)) {
                    return;
                }

                const formattedValue = formatValue(value);

                if (!formattedValue) {
                    return;
                }

                fields.push([`${humanizeKey(key)}:`, formattedValue]);
            });

            return fields;
        }

        function showFailure(message, heading = 'Verification Not Found') {
            title.textContent = heading;
            body.replaceChildren();
            body.classList.remove('is-verified');
            addParagraph(body, message);

            supportDetails.forEach((detail) => addParagraph(body, detail));
            modal.show();
        }

        function showSuccess(response) {
            const documentType = response.document_type || response.certificate_type || 'Document';

            title.textContent = `${documentType} verified`;
            body.replaceChildren();
            body.classList.add('is-verified');

            const fields = buildFields(response);
            const details = document.createElement('dl');
            details.className = 'verification-details';

            fields.forEach(([label, value]) => {
                const row = document.createElement('div');
                const fieldLabel = document.createElement('dt');
                const fieldValue = document.createElement('dd');

                fieldLabel.textContent = label.replace(':', '');
                fieldValue.textContent = value;
                row.append(fieldLabel, fieldValue);
                details.appendChild(row);
            });

            const note = document.createElement('div');
            note.className = 'verification-success-note';
            note.innerHTML = '<span class="verification-note-mark" aria-hidden="true"></span><div class="verification-note-content"><p class="verification-note-title"></p><p class="verification-note-copy">Please keep this verification ID safe for your records.</p><p class="verification-note-contact">For further verification, call <a href="tel:+923144444010">0314-4444010</a> or visit <a href="https://www.career.edu.pk" target="_blank" rel="noopener noreferrer">www.career.edu.pk</a>.</p></div>';
            note.querySelector('.verification-note-title').textContent = `Congratulations, ${response.name || 'student'}!`;

            body.append(details, note);
            modal.show();
        }

        forms.forEach((form) => {
            const input = form.querySelector('.js-verification-id');
            const submitButton = form.querySelector('.js-submit-button');

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
                    const response = await fetch(verificationLookupUrlTemplate.replace('__VERIFICATION_ID__', encodeURIComponent(verificationId)), {
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
        });
    })();
</script>
@endpush
