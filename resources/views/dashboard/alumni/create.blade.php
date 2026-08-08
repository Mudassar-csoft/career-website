@extends('dashboard.layout')

@section('title', 'Add Alumni Review | Dashboard')

@section('topbar-actions')
    <a href="{{ route('dashboard.alumni.index') }}" class="dash-btn dash-btn-secondary">&larr; All Alumni</a>
@endsection

@section('content')
    <div class="dash-page">
        <div class="dash-page-header">
            <h2>Add Alumni Review</h2>
        </div>

        <div class="dash-form-box">
            <form action="{{ route('dashboard.alumni.store') }}" method="POST" enctype="multipart/form-data" id="alumni-form">
                @include('dashboard.alumni._form', ['alum' => $alum])

                <button type="submit" class="dash-btn">Publish</button>
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
