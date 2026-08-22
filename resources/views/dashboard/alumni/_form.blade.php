@csrf

<div class="dash-form-row">
    <div class="dash-form-group">
        <label for="alumni-name">Name</label>
        <input type="text" id="alumni-name" name="name" value="{{ old('name', $alum->name) }}" required>
        @error('name')
            <p class="dash-form-error">{{ $message }}</p>
        @enderror
    </div>
    <div class="dash-form-group">
        <label for="alumni-designation">Designation</label>
        <input type="text" id="alumni-designation" name="designation" value="{{ old('designation', $alum->designation) }}" placeholder="e.g. Graphic Designer" required>
        @error('designation')
            <p class="dash-form-error">{{ $message }}</p>
        @enderror
    </div>
</div>

<div class="dash-form-group">
    <label for="alumni-review">Review</label>
    <textarea id="alumni-review" name="review" rows="5" required>{{ old('review', $alum->review) }}</textarea>
    @error('review')
        <p class="dash-form-error">{{ $message }}</p>
    @enderror
</div>

<div class="dash-form-group">
    <label for="alumni-photo">Photo</label>
    <input
        type="file"
        id="alumni-photo"
        name="photo"
        accept="{{ \App\Support\DashboardImageUpload::ACCEPT_ATTRIBUTE }}"
        data-dashboard-image-upload
        data-allowed-extensions="{{ implode(',', \App\Support\DashboardImageUpload::ALLOWED_EXTENSIONS) }}"
        data-max-size-kb="{{ \App\Support\DashboardImageUpload::MAX_FILE_SIZE_KB }}"
    >
    <p class="dash-form-hint">{{ \App\Support\DashboardImageUpload::HINT }}</p>
    @if ($alum->photo)
        <img class="dash-image-preview" style="display:block;border-radius:50%;width:90px;height:90px;" src="{{ $alum->photo_url }}" alt="{{ $alum->name }}">
    @endif
    <img id="alumni-photo-preview" class="dash-image-preview" alt="Preview">
    @error('photo')
        <p class="dash-form-error">{{ $message }}</p>
    @enderror
</div>
