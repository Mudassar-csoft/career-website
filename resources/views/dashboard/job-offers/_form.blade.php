@csrf

<div class="dash-form-row">
    <div class="dash-form-group">
        <label for="job-title">Job Title</label>
        <input type="text" id="job-title" name="title" value="{{ old('title', $jobOffer->title) }}" required>
        @error('title') <p class="dash-form-error">{{ $message }}</p> @enderror
    </div>
    <div class="dash-form-group">
        <label for="job-type">Job Type</label>
        <input type="text" id="job-type" name="job_type" value="{{ old('job_type', $jobOffer->job_type) }}" placeholder="e.g. Full Time" required>
        @error('job_type') <p class="dash-form-error">{{ $message }}</p> @enderror
    </div>
</div>
<div class="dash-form-row">
    <div class="dash-form-group">
        <label for="job-location">Location</label>
        <input type="text" id="job-location" name="location" value="{{ old('location', $jobOffer->location) }}" required>
        @error('location') <p class="dash-form-error">{{ $message }}</p> @enderror
    </div>
    <div class="dash-form-group">
        <label for="job-deadline">Application Deadline</label>
        <input type="date" id="job-deadline" name="deadline" value="{{ old('deadline', $jobOffer->deadline?->format('Y-m-d')) }}" required>
        @error('deadline') <p class="dash-form-error">{{ $message }}</p> @enderror
    </div>
</div>
<div class="dash-form-group">
    <label for="job-url">Application URL</label>
    <input type="url" id="job-url" name="application_url" value="{{ old('application_url', $jobOffer->application_url) }}" placeholder="https://example.com/apply">
    <p class="dash-form-hint">Leave blank to show no application link.</p>
    @error('application_url') <p class="dash-form-error">{{ $message }}</p> @enderror
</div>
