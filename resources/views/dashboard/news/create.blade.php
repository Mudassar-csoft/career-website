@extends('dashboard.layout')

@section('title', $news->exists ? 'Edit News | Dashboard' : 'Create News | Dashboard')

@section('topbar-actions')
    <a href="{{ route('dashboard.news.index') }}" class="dash-btn dash-btn-secondary">&larr; All News</a>
@endsection

@section('content')
    <div class="dash-page">
        <div class="dash-page-header">
            <h2>{{ $news->exists ? 'Edit News' : 'Create News' }}</h2>
        </div>

        <div class="dash-form-box">
            <form action="{{ $news->exists ? route('dashboard.news.update', $news) : route('dashboard.news.store') }}" method="POST" enctype="multipart/form-data" id="news-form">
                @csrf
                @if ($news->exists)
                    @method('PUT')
                @endif

                <div class="dash-form-row">
                    <div class="dash-form-group">
                        <label for="news-title">Title (50-55 characters)</label>
                        <input type="text" id="news-title" name="title" value="{{ old('title', $news->title) }}" minlength="50" maxlength="55" required>
                        @error('title')
                            <p class="dash-form-error">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="dash-form-group">
                        <label for="news-subtitle">Sub Title</label>
                        <input type="text" id="news-subtitle" name="subtitle" value="{{ old('subtitle', $news->subtitle) }}">
                        @error('subtitle')
                            <p class="dash-form-error">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="dash-form-row">
                    <div class="dash-form-group">
                        <label for="news-slug">Slug</label>
                        <input type="text" id="news-slug" name="slug" value="{{ old('slug', $news->slug) }}" required>
                        <p class="dash-form-hint">Auto-filled from the title — edit if needed.</p>
                        @error('slug')
                            <p class="dash-form-error">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="dash-form-group">
                        <label for="news-type">News Type</label>
                        <div class="dash-type-row">
                            <select id="news-type" name="news_type_id" required>
                                <option value="">Select a type</option>
                                @foreach ($newsTypes as $type)
                                    <option value="{{ $type->id }}" @selected(old('news_type_id', $news->news_type_id) == $type->id)>{{ $type->name }}</option>
                                @endforeach
                            </select>
                            <button type="button" class="dash-icon-btn-add" id="news-type-add-btn" aria-label="Add news type">+</button>
                        </div>
                        @error('news_type_id')
                            <p class="dash-form-error">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="dash-form-group">
                        <label for="news-published-at">News Date</label>
                        <input
                            type="date"
                            id="news-published-at"
                            name="published_at"
                            value="{{ old('published_at', $news->publication_date?->format('Y-m-d') ?? now()->format('Y-m-d')) }}"
                            required
                        >
                        @error('published_at')
                            <p class="dash-form-error">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="dash-form-group">
                    <label for="news-image">Image</label>
                    <input
                        type="file"
                        id="news-image"
                        name="image"
                        accept="{{ \App\Support\DashboardImageUpload::ACCEPT_ATTRIBUTE }}"
                        data-dashboard-image-upload
                        data-allowed-extensions="{{ implode(',', \App\Support\DashboardImageUpload::ALLOWED_EXTENSIONS) }}"
                        data-max-size-kb="{{ \App\Support\DashboardImageUpload::MAX_FILE_SIZE_KB }}"
                        onchange="window.previewNewsImage && window.previewNewsImage(this)"
                    >
                    <p class="dash-form-hint">{{ $news->image ? 'Upload a new file only to replace the current image. ' : '' }}{{ \App\Support\DashboardImageUpload::HINT }}</p>
                    <img id="news-image-preview" class="dash-image-preview" src="{{ $news->image ? $news->image_url : '' }}" alt="Preview" onerror="this.onerror=null;this.src='{{ asset('assets/images/img61.png') }}';" @if ($news->image) style="display:block;" @endif>
                    @error('image')
                        <p class="dash-form-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="dash-form-group">
                    <label for="news-content">Content</label>
                    <textarea id="news-content" name="content" rows="10">{{ old('content', $news->content) }}</textarea>
                    @error('content')
                        <p class="dash-form-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="dash-form-group" style="margin-top:8px;padding-top:24px;border-top:1px solid #eef1f4;">
                    <label style="font-size:15px;">SEO Settings</label>
                    <p class="dash-form-hint">Controls how this article appears in search engine results. Leave blank to use sensible defaults.</p>
                </div>

                <div class="dash-form-group">
                    <label for="news-meta-title">Meta Title</label>
                    <input type="text" id="news-meta-title" name="meta_title" value="{{ old('meta_title', $news->meta_title) }}" maxlength="255" placeholder="Defaults to the title above if left blank">
                    @error('meta_title')
                        <p class="dash-form-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="dash-form-group">
                    <label for="news-meta-description">Meta Description</label>
                    <textarea id="news-meta-description" name="meta_description" rows="3" maxlength="500" placeholder="Shown under the title in search results — aim for 150-160 characters.">{{ old('meta_description', $news->meta_description) }}</textarea>
                    @error('meta_description')
                        <p class="dash-form-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="dash-form-group">
                    <label for="news-meta-keywords">Meta Keywords</label>
                    <input type="text" id="news-meta-keywords" name="meta_keywords" value="{{ old('meta_keywords', $news->meta_keywords) }}" placeholder="Comma-separated, e.g. career institute news, admissions, faisalabad campus">
                    @error('meta_keywords')
                        <p class="dash-form-error">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="dash-btn">{{ $news->exists ? 'Update News' : 'Publish News' }}</button>
            </form>
        </div>
    </div>

    <div class="dash-modal-overlay" id="news-type-modal">
        <div class="dash-modal">
            <h3>Add News Type</h3>
            <div class="dash-form-group" style="margin-bottom:0;">
                <label for="news-type-name">Type name</label>
                <input type="text" id="news-type-name" placeholder="e.g. Announcements">
                <p class="dash-modal-error" id="news-type-error"></p>
            </div>
            <div class="dash-modal-actions">
                <button type="button" class="dash-btn dash-btn-secondary" id="news-type-cancel">Cancel</button>
                <button type="button" class="dash-btn" id="news-type-save">Save</button>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
<script>
    if (window.ClassicEditor) {
        ClassicEditor.create(document.querySelector('#news-content')).catch(function (error) {
            console.error(error);
        });
    }

    var titleInput = document.getElementById('news-title');
    var slugInput = document.getElementById('news-slug');
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

    var imageInput = document.getElementById('news-image');
    var imagePreview = document.getElementById('news-image-preview');

    window.previewNewsImage = function (input) {
        var file = input.files[0];
        if (!file) {
            imagePreview.style.display = 'none';
            return;
        }
        imagePreview.src = URL.createObjectURL(file);
        imagePreview.style.display = 'block';
    };

    imageInput.addEventListener('change', function () {
        window.previewNewsImage(imageInput);
    });

    var typeModal = document.getElementById('news-type-modal');
    var typeAddBtn = document.getElementById('news-type-add-btn');
    var typeCancelBtn = document.getElementById('news-type-cancel');
    var typeSaveBtn = document.getElementById('news-type-save');
    var typeNameInput = document.getElementById('news-type-name');
    var typeError = document.getElementById('news-type-error');
    var typeSelect = document.getElementById('news-type');

    function openTypeModal() {
        typeModal.classList.add('open');
        typeError.style.display = 'none';
        typeNameInput.value = '';
        typeNameInput.focus();
    }

    function closeTypeModal() {
        typeModal.classList.remove('open');
    }

    typeAddBtn.addEventListener('click', openTypeModal);
    typeCancelBtn.addEventListener('click', closeTypeModal);
    typeModal.addEventListener('click', function (e) {
        if (e.target === typeModal) {
            closeTypeModal();
        }
    });

    typeSaveBtn.addEventListener('click', function () {
        var name = typeNameInput.value.trim();
        if (!name) {
            typeError.textContent = 'Please enter a type name.';
            typeError.style.display = 'block';
            return;
        }

        fetch('{{ route('dashboard.news.types.store') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json',
            },
            body: JSON.stringify({ name: name }),
        })
            .then(function (response) {
                if (!response.ok) {
                    return response.json().then(function (data) {
                        throw new Error(data.message || 'Could not save this type.');
                    });
                }
                return response.json();
            })
            .then(function (type) {
                var option = document.createElement('option');
                option.value = type.id;
                option.textContent = type.name;
                option.selected = true;
                typeSelect.appendChild(option);
                closeTypeModal();
            })
            .catch(function (error) {
                typeError.textContent = error.message;
                typeError.style.display = 'block';
            });
    });
</script>
@endpush
