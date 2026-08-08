@extends('dashboard.layout')

@section('title', 'Add Collaborator | Dashboard')

@section('topbar-actions')
    <a href="{{ route('dashboard.collaborators.index') }}" class="dash-btn dash-btn-secondary">&larr; All Collaborators</a>
@endsection

@section('content')
    <div class="dash-page">
        <div class="dash-page-header">
            <h2>Add Collaborator</h2>
        </div>

        <div class="dash-form-box">
            <form action="{{ route('dashboard.collaborators.store') }}" method="POST" enctype="multipart/form-data" id="collaborator-form">
                @include('dashboard.collaborators._form', ['collaborator' => $collaborator])

                <button type="submit" class="dash-btn">Publish</button>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    var logoInput = document.getElementById('collaborator-logo');
    var logoPreview = document.getElementById('collaborator-logo-preview');
    logoInput.addEventListener('change', function () {
        var file = logoInput.files[0];
        if (!file) {
            logoPreview.style.display = 'none';
            return;
        }
        logoPreview.src = URL.createObjectURL(file);
        logoPreview.style.display = 'block';
    });
</script>
@endpush
