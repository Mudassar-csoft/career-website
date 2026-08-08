@extends('dashboard.layout')

@section('title', 'Create Blog | Dashboard')

@section('topbar-actions')
    <a href="{{ route('dashboard.blogs.index') }}" class="dash-btn dash-btn-secondary">&larr; All Blogs</a>
@endsection

@section('content')
    <div class="dash-page">
        <div class="dash-page-header">
            <h2>Create Blog</h2>
        </div>

        <div class="dash-form-box">
            <form action="{{ route('dashboard.blogs.store') }}" method="POST" enctype="multipart/form-data" id="blog-form">
                @include('dashboard.blogs._form', ['blog' => $blog])

                <button type="submit" class="dash-btn">Publish Blog</button>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
<script>
    if (window.ClassicEditor) {
        ClassicEditor.create(document.querySelector('#blog-content')).catch(function (error) {
            console.error(error);
        });
    }

    var titleInput = document.getElementById('blog-title');
    var slugInput = document.getElementById('blog-slug');
    var slugTouched = slugInput.value.length > 0;

    slugInput.addEventListener('input', function () {
        slugTouched = true;
    });

    titleInput.addEventListener('input', function () {
        if (slugTouched) {
            return;
        }
        slugInput.value = titleInput.value
            .toLowerCase()
            .trim()
            .replace(/[^a-z0-9]+/g, '-')
            .replace(/(^-|-$)/g, '');
    });

    var imageInput = document.getElementById('blog-image');
    var imagePreview = document.getElementById('blog-image-preview');

    imageInput.addEventListener('change', function () {
        var file = imageInput.files[0];
        if (!file) {
            imagePreview.style.display = 'none';
            return;
        }
        imagePreview.src = URL.createObjectURL(file);
        imagePreview.style.display = 'block';
    });
</script>
@endpush
