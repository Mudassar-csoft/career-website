@csrf

<div class="dash-form-group">
    <label for="collaborator-name">Organization Name</label>
    <input type="text" id="collaborator-name" name="name" value="{{ old('name', $collaborator->name) }}" required>
    @error('name')
        <p class="dash-form-error">{{ $message }}</p>
    @enderror
</div>

<div class="dash-form-group">
    <label for="collaborator-logo">Logo</label>
    <input
        type="file"
        id="collaborator-logo"
        name="logo"
        accept="{{ \App\Support\DashboardImageUpload::ACCEPT_ATTRIBUTE }}"
        data-dashboard-image-upload
        data-allowed-extensions="{{ implode(',', \App\Support\DashboardImageUpload::ALLOWED_EXTENSIONS) }}"
        data-max-size-kb="{{ \App\Support\DashboardImageUpload::MAX_FILE_SIZE_KB }}"
        @if(! $collaborator->exists) required @endif
    >
    <p class="dash-form-hint">{{ \App\Support\DashboardImageUpload::HINT }}</p>
    @if ($collaborator->logo)
        <img class="dash-image-preview" style="display:block;background:#fff;padding:10px;" src="{{ asset('storage/'.$collaborator->logo) }}" alt="{{ $collaborator->name }}">
    @endif
    <img id="collaborator-logo-preview" class="dash-image-preview" alt="Preview">
    @error('logo')
        <p class="dash-form-error">{{ $message }}</p>
    @enderror
</div>
