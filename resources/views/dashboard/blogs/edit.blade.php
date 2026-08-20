@extends('dashboard.layout')

@section('title', 'Edit Blog | Dashboard')

@section('topbar-actions')
    <a href="{{ route('dashboard.blogs.index') }}" class="dash-btn dash-btn-secondary">&larr; All Blogs</a>
@endsection

@section('content')
    <div class="dash-page">
        <div class="dash-page-header">
            <h2>Edit Blog</h2>
        </div>

        <div class="dash-form-box">
            <form action="{{ route('dashboard.blogs.update', $blog) }}" method="POST" enctype="multipart/form-data" id="blog-form">
                @method('PUT')
                @include('dashboard.blogs._form', ['blog' => $blog])

                <button type="submit" class="dash-btn">Update Blog</button>
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
    var previewObjectUrl = '';

    if (imageInput && imagePreview) {
        imageInput.addEventListener('change', function () {
            var currentImageSrc = imagePreview.getAttribute('data-current-src') || '';
            var file = imageInput.files && imageInput.files[0];

            if (previewObjectUrl) {
                URL.revokeObjectURL(previewObjectUrl);
                previewObjectUrl = '';
            }

            if (!file) {
                if (currentImageSrc) {
                    imagePreview.src = currentImageSrc;
                    imagePreview.style.display = 'block';
                } else {
                    imagePreview.removeAttribute('src');
                    imagePreview.style.display = 'none';
                }

                return;
            }

            previewObjectUrl = URL.createObjectURL(file);
            imagePreview.src = previewObjectUrl;
            imagePreview.style.display = 'block';
        });
    }
</script>
@endpush
