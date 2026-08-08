@extends('dashboard.layout')

@section('title', 'Edit Alumni Review | Dashboard')

@section('topbar-actions')
    <a href="{{ route('dashboard.alumni.index') }}" class="dash-btn dash-btn-secondary">&larr; All Alumni</a>
@endsection

@section('content')
    <div class="dash-page">
        <div class="dash-page-header">
            <h2>Edit Alumni Review</h2>
        </div>

        <div class="dash-form-box">
            <form action="{{ route('dashboard.alumni.update', $alum) }}" method="POST" enctype="multipart/form-data" id="alumni-form">
                @method('PUT')
                @include('dashboard.alumni._form', ['alum' => $alum])

                <button type="submit" class="dash-btn">Update</button>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    var alumniPhotoInput = document.getElementById('alumni-photo');
    var alumniPhotoPreview = document.getElementById('alumni-photo-preview');
    alumniPhotoInput.addEventListener('change', function () {
        var file = alumniPhotoInput.files[0];
        if (!file) {
            alumniPhotoPreview.style.display = 'none';
            return;
        }
        alumniPhotoPreview.src = URL.createObjectURL(file);
        alumniPhotoPreview.style.display = 'block';
    });
</script>
@endpush
