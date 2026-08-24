@extends('dashboard.layout')

@section('title', 'Edit Success Story | Dashboard')

@section('topbar-actions')
    <a href="{{ route('dashboard.success-stories.index') }}" class="dash-btn dash-btn-secondary">&larr; All Success Stories</a>
@endsection

@section('content')
    <div class="dash-page">
        <div class="dash-page-header"><h2>Edit Success Story</h2></div>
        <div class="dash-form-box" style="max-width:980px;">
            <form action="{{ route('dashboard.success-stories.update', $story) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @include('dashboard.success-stories._form', ['story' => $story])
                <button type="submit" class="dash-btn">Update Story</button>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    var storyImageInput = document.getElementById('story-image');
    var storyImagePreview = document.getElementById('story-image-preview');
    storyImageInput.addEventListener('change', function () {
        var file = storyImageInput.files[0];
        storyImagePreview.style.display = file ? 'block' : 'none';
        if (file) storyImagePreview.src = URL.createObjectURL(file);
    });
</script>
@endpush
