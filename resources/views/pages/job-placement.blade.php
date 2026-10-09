@extends('layouts.app')
@section('title', 'Job Placement Services - Career Institute Pakistan')
@section('body_class', 'job-page')
@section('content')
<section class="top-banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <p class="mb-3">Transform Your Future</p>
                <h1 class="mb-4">Discover Opportunities That Inspire!</h1>
                <div class="btn-block">
                    <a href="{{ route('job-placement') }}#job-placement-form" class="btn aq-btn" data-apply-job="">Submit Resume</a>
                    {{-- <a href="#" class="btn wa-btn">Post a Job</a> --}}
                </div>
            </div>
        </div>
    </div>
</section>
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
                        <div class="show-box">{{ $jobOffers->count() }} Show</div>
                        <form class="filter-box" method="GET" action="{{ route('job-placement') }}">
                            <div class="row g-2">
                                <div class="col-lg"><input type="text" class="form-control" name="search" value="{{ $search }}" placeholder="Search Keyword..."></div>
                                <div class="col-lg"><input type="text" class="form-control" name="job_type" value="{{ $jobType }}" placeholder="Job Type..."></div>
                                <div class="col-lg"><input type="text" class="form-control" name="location" value="{{ $location }}" placeholder="Search Location"></div>
                                <div class="col-auto d-none d-lg-block"><button class="search-btn" type="submit"><img src="{{ asset('assets/images/icon53.png') }}" alt="Search jobs"></button></div>
                                <div class="col-12 d-lg-none"><button class="search-btn" type="submit"><img src="{{ asset('assets/images/icon53.png') }}" alt="Search jobs"> Search</button></div>
                            </div>
                        </form>
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
                                @forelse ($jobOffers as $jobOffer)
                                    <tr>
                                        <td>{{ $jobOffer->title }}</td>
                                        <td>{{ $jobOffer->created_at->format('d-m-Y') }}</td>
                                        <td><span class="job-badge">{{ $jobOffer->job_type }}</span></td>
                                        <td>{{ $jobOffer->location }}</td>
                                        <td>{{ $jobOffer->deadline->format('d-m-Y') }}</td>
                                        <td>
                                            <a href="{{ route('job-placement', ['job' => $jobOffer->id]) }}#job-placement-form" class="apply-btn" data-apply-job="{{ $jobOffer->id }}" aria-label="Apply for {{ $jobOffer->title }}">Apply Now</a>
                                            @if ($jobOffer->application_url)
                                                <a href="{{ $jobOffer->application_url }}" class="d-block mt-2" target="_blank" rel="noopener noreferrer">Apply externally</a>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr><td colspan="6" class="text-center py-4">No job offers available.</td></tr>
                                @endforelse
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
                <h1>Discover Opportunities That Inspire!</h1>
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
                                <img src="{{ asset('assets/images/icon48.svg') }}" alt="Career Institute feature icon">
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
                                <img src="{{ asset('assets/images/icon49.svg') }}" alt="Career Institute feature icon">
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
                                <img src="{{ asset('assets/images/icon50.svg') }}" alt="Career Institute feature icon">
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
                                <img src="{{ asset('assets/images/icon51.svg') }}" alt="Career Institute feature icon">
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
                                <img src="{{ asset('assets/images/icon48.svg') }}" alt="Career Institute feature icon">
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
                                <img src="{{ asset('assets/images/icon49.svg') }}" alt="Career Institute feature icon">
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
                                <img src="{{ asset('assets/images/icon50.svg') }}" alt="Career Institute feature icon">
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
                                <img src="{{ asset('assets/images/icon51.svg') }}" alt="Career Institute feature icon">
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
            <div class="col-lg-12">
                <ul>
                    <li>
                        <div class="box">
                            <div class="img-hold">
                                <img src="{{ asset('assets/images/icon20.svg') }}" alt="Career Institute feature icon">
                            </div>
                            <div class="t-bar">
                                <h3>Call Us Today</h3>
                                <p>0341-4444010</p>
                                <p>0314-4444010</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="box">
                            <div class="img-hold">
                                <img src="{{ asset('assets/images/icon21.svg') }}" alt="Career Institute feature icon">
                            </div>
                            <div class="t-bar">
                                <h3>Email</h3>
                                <p>info@career.edu.pk</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="box">
                            <div class="img-hold">
                                <img src="{{ asset('assets/images/icon22.svg') }}" alt="Career Institute feature icon">
                            </div>
                            <div class="t-bar">
                                <h3>Webex Meetings</h3>
                                <p>Career.pk</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="box">
                            <div class="img-hold">
                                <img src="{{ asset('assets/images/icon136.svg') }}" alt="Career Institute feature icon">
                            </div>
                            <div class="t-bar">
                                <h3>Google Meet</h3>
                                <p>Career.pk</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="box">
                            <div class="img-hold">
                                <img src="{{ asset('assets/images/icon137.svg') }}" alt="Career Institute feature icon">
                            </div>
                            <div class="t-bar">
                                <h3>Microsoft Team</h3>
                                <p>Career.pk</p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-lg-12">
                <div class="form-block">
                    <h3>Submit your application</h3>
                    <p>Choose a job or submit your CV for future opportunities.</p>
                    @if (session('status'))
                        <div class="alert alert-success" role="status">{{ session('status') }}</div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            @foreach ($errors->all() as $error)<div>{{ $error }}</div>@endforeach
                        </div>
                    @endif
                    <form id="job-placement-form" class="row g-3 lead-form" method="POST" action="{{ route('job-applications.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="col-12">
                            <label for="application-job-offer" class="visually-hidden">Applying for</label>
                            <select id="application-job-offer" name="job_offer_id" class="form-select">
                                <option value="">General CV submission / Future opportunities</option>
                                @foreach ($applicationJobs as $job)
                                    <option value="{{ $job->id }}" @selected((string) old('job_offer_id', $selectedJobId) === (string) $job->id)>{{ $job->title }} — {{ $job->location }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" maxlength="255" autocomplete="name" placeholder="Name" aria-label="Name" required>
                        </div>
                        <div class="col-md-6">
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" maxlength="255" autocomplete="email" placeholder="Email" aria-label="Email" required>
                        </div>
                        <div class="col-md-6">
                            <input type="tel" class="form-control" name="phone" value="{{ old('phone') }}" maxlength="30" autocomplete="tel" placeholder="Contact No" aria-label="Contact number" required>
                        </div>
                        <div class="col-md-6">
                            <input type="url" class="form-control" name="linkedin_url" value="{{ old('linkedin_url') }}" maxlength="2048" placeholder="Your LinkedIn Profile URL" aria-label="LinkedIn profile URL">
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="institution" value="{{ old('institution') }}" maxlength="255" placeholder="College/University" aria-label="College or university">
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="city" value="{{ old('city') }}" maxlength="255" autocomplete="address-level2" placeholder="City" aria-label="City">
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="qualification" value="{{ old('qualification') }}" maxlength="255" placeholder="Qualification" aria-label="Qualification">
                        </div>
                        <div class="col-md-6">
                            <div class="file-upload-wrapper">
                                <div class="input-group custom-file-upload">
                                    <label class="input-group-text" for="fileUpload">
                                        Choose File
                                    </label>
                                    <input type="file" id="fileUpload" name="document" accept=".pdf,.doc,.docx" aria-label="Upload your CV" aria-describedby="document-help" required>
                                    <span class="form-control file-text">
                                        <span class="text-truncate" data-file-name data-placeholder="Upload your CV" aria-live="polite">Upload your CV</span>
                                    </span>
                                </div>
                                <small id="document-help" class="text-muted">PDF, DOC or DOCX. Maximum 5 MB.</small>
                            </div>
                        </div>
                        <div class="col-12 mt-4">
                            <button type="submit" class="btn sm-btn">Submit Application</button>
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
                    <li><a href="https://www.facebook.com/careerinstituteofficial" target="_blank" rel="noopener noreferrer" aria-label="Career Institute on Facebook"><img src="{{ asset('assets/images/fb.png') }}" alt="Facebook"></a></li>
                    <li><a href="https://www.instagram.com/careerinstituteofficial" target="_blank" rel="noopener noreferrer" aria-label="Career Institute on Instagram"><img src="{{ asset('assets/images/instagram.png') }}" alt="Instagram"></a></li>
                    <li><a href="https://www.youtube.com/@CareerInstitutepk" target="_blank" rel="noopener noreferrer" aria-label="Career Institute on YouTube"><img src="{{ asset('assets/images/youtube.png') }}" alt="YouTube"></a></li>
                    <li><a href="https://www.tiktok.com/@careerinstituteofficial" target="_blank" rel="noopener noreferrer" aria-label="Career Institute on TikTok"><img src="{{ asset('assets/images/tiktok.png') }}" alt="TikTok"></a></li>
                    <li><a href="https://www.linkedin.com/company/careerinstituteofficial/" target="_blank" rel="noopener noreferrer" aria-label="Career Institute on LinkedIn"><img src="{{ asset('assets/images/linkdin.png') }}" alt="LinkedIn"></a></li>
                    <li><a href="https://twitter.com/careerofficials" target="_blank" rel="noopener noreferrer" aria-label="Career Institute on X"><img src="{{ asset('assets/images/x.png') }}" alt="X"></a></li>
                    <li><a href="https://wa.me/923144444010" target="_blank" rel="noopener noreferrer" aria-label="Chat with Career Institute on WhatsApp"><img src="{{ asset('assets/images/wp.png') }}" alt="WhatsApp"></a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
    #job-placement-form {
        scroll-margin-top: 24px;
    }
    #job-placement-form .form-select {
        min-height: 48px;
        padding: 15px 40px 15px 17px;
        border: 1px solid #828282;
        border-radius: 10px;
        background-color: #fff;
        color: #595959;
        font-size: 14px;
        line-height: 16px;
    }
    #job-placement-form .custom-file-upload {
        position: relative;
        flex-wrap: nowrap;
        width: 100%;
        max-width: none;
        min-height: 48px;
        background: #fff;
        border: 1px solid #828282;
        border-radius: 10px;
    }
    #job-placement-form .custom-file-upload .input-group-text {
        flex-shrink: 0;
        min-width: 0;
        height: auto;
        margin: 0;
        padding: 15px 17px;
        background: #f2f2f2;
        border: 0;
        border-right: 1px solid #828282;
        border-radius: 9px 0 0 9px;
        font-size: 14px;
        line-height: 16px;
    }
    #job-placement-form .custom-file-upload .file-text {
        flex: 1;
        min-width: 0;
        height: auto;
        margin: 0;
        padding: 15px 17px;
        border: 0;
        border-radius: 0 9px 9px 0;
        color: #595959;
        font-size: 14px;
        line-height: 16px;
    }
    #job-placement-form .custom-file-upload input[type="file"] {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 0;
        border: 0;
        opacity: 0;
        cursor: pointer;
        z-index: 3;
    }
    #job-placement-form .custom-file-upload:focus-within {
        outline: 2px solid #017e8f;
        outline-offset: 3px;
    }
    #job-placement-form .file-upload-wrapper small {
        display: block;
        margin-top: 6px;
    }
</style>
@endpush

@push('scripts')
<script>
(() => {
    const form = document.getElementById('job-placement-form');
    const jobSelect = document.getElementById('application-job-offer');

    document.querySelectorAll('[data-apply-job]').forEach((link) => {
        link.addEventListener('click', (event) => {
            if (event.button !== 0 || event.ctrlKey || event.metaKey || event.shiftKey || event.altKey) return;

            event.preventDefault();
            jobSelect.value = link.dataset.applyJob;
            const url = new URL(window.location.href);
            if (jobSelect.value) url.searchParams.set('job', jobSelect.value);
            else url.searchParams.delete('job');
            url.hash = 'job-placement-form';
            window.history.replaceState(null, '', url);
            form.scrollIntoView({ behavior: window.matchMedia('(prefers-reduced-motion: reduce)').matches ? 'auto' : 'smooth', block: 'start' });
            jobSelect.focus({ preventScroll: true });
        });
    });
})();
</script>
@endpush
