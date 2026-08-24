@csrf

<div class="dash-form-row">
    <div class="dash-form-group">
        <label for="story-name">Student Name</label>
        <input id="story-name" name="name" value="{{ old('name', $story->name) }}" required>
        @error('name') <p class="dash-form-error">{{ $message }}</p> @enderror
    </div>
    <div class="dash-form-group">
        <label for="story-program">Program</label>
        <input id="story-program" name="program" value="{{ old('program', $story->program) }}" required>
        @error('program') <p class="dash-form-error">{{ $message }}</p> @enderror
    </div>
</div>

<div class="dash-form-row">
    <div class="dash-form-group">
        <label for="story-location">Location</label>
        <input id="story-location" name="location" value="{{ old('location', $story->location) }}" placeholder="e.g. Faisalabad, Pakistan" required>
        @error('location') <p class="dash-form-error">{{ $message }}</p> @enderror
    </div>
    <div class="dash-form-group">
        <label for="story-role">Current Role</label>
        <input id="story-role" name="role" value="{{ old('role', $story->role) }}" placeholder="e.g. Frontend Developer" required>
        @error('role') <p class="dash-form-error">{{ $message }}</p> @enderror
    </div>
</div>

<div class="dash-form-group">
    <label for="story-company">Company or Platform</label>
    <input id="story-company" name="company" value="{{ old('company', $story->company) }}" placeholder="e.g. Upwork">
    @error('company') <p class="dash-form-error">{{ $message }}</p> @enderror
</div>

<div class="dash-form-row">
    <div class="dash-form-group">
        <label for="story-before">Before</label>
        <textarea id="story-before" name="before_story" rows="5" required>{{ old('before_story', $story->before_story) }}</textarea>
        @error('before_story') <p class="dash-form-error">{{ $message }}</p> @enderror
    </div>
    <div class="dash-form-group">
        <label for="story-after">After</label>
        <textarea id="story-after" name="after_story" rows="5" required>{{ old('after_story', $story->after_story) }}</textarea>
        @error('after_story') <p class="dash-form-error">{{ $message }}</p> @enderror
    </div>
</div>

<div class="dash-form-group">
    <label>Journey Steps</label>
    <p class="dash-form-hint">Add up to five milestones. Empty entries are ignored.</p>
    @for ($index = 0; $index < 5; $index++)
        <input name="journey_steps[]" value="{{ old('journey_steps.'.$index, $story->journey_steps[$index] ?? '') }}" placeholder="Journey step {{ $index + 1 }}" style="margin-bottom:8px;">
    @endfor
    @error('journey_steps') <p class="dash-form-error">{{ $message }}</p> @enderror
    @error('journey_steps.*') <p class="dash-form-error">{{ $message }}</p> @enderror
</div>

<div class="dash-form-group">
    <label for="story-image">Student Photo</label>
    <input
        type="file"
        id="story-image"
        name="image"
        accept="{{ \App\Support\DashboardImageUpload::ACCEPT_ATTRIBUTE }}"
        data-dashboard-image-upload
        data-allowed-extensions="{{ implode(',', \App\Support\DashboardImageUpload::ALLOWED_EXTENSIONS) }}"
        data-max-size-kb="{{ \App\Support\DashboardImageUpload::MAX_FILE_SIZE_KB }}"
        @if (! $story->exists) required @endif
    >
    <p class="dash-form-hint">{{ \App\Support\DashboardImageUpload::HINT }}</p>
    @if ($story->exists)
        <img class="dash-image-preview" style="display:block;" src="{{ $story->image_url }}" alt="{{ $story->name }}">
    @endif
    <img id="story-image-preview" class="dash-image-preview" alt="Preview">
    @error('image') <p class="dash-form-error">{{ $message }}</p> @enderror
</div>
