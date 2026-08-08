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
    <input type="file" id="collaborator-logo" name="logo" accept="image/*" @if(! $collaborator->exists) required @endif>
    @if ($collaborator->logo)
        <img class="dash-image-preview" style="display:block;background:#fff;padding:10px;" src="{{ asset('storage/'.$collaborator->logo) }}" alt="{{ $collaborator->name }}">
    @endif
    <img id="collaborator-logo-preview" class="dash-image-preview" alt="Preview">
    @error('logo')
        <p class="dash-form-error">{{ $message }}</p>
    @enderror
</div>
