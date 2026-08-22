@extends('dashboard.layout')

@section('title', 'Gallery Photos | '.$category->name.' | Dashboard')

@push('styles')
<style>
    .dash-gallery-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
        gap: 16px;
    }
    .dash-gallery-item {
        position: relative;
        border-radius: 10px;
        overflow: hidden;
        border: 1px solid #e2e8ef;
        background: #fff;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
    }
    .dash-gallery-media {
        aspect-ratio: 1 / 1;
        background: #eef1f4;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }
    .dash-gallery-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }
    .dash-gallery-fallback {
        display: none;
        width: 100%;
        height: 100%;
        padding: 18px;
        text-align: center;
        font-size: 13px;
        font-weight: 600;
        color: #7c8a94;
        background: linear-gradient(135deg, #f7fafc 0%, #eaf1f6 100%);
    }
    .dash-gallery-item form {
        position: absolute;
        top: 6px;
        right: 6px;
        z-index: 1;
    }
    .dash-gallery-item button {
        width: 28px;
        height: 28px;
        border-radius: 50%;
        border: 0;
        background: rgba(197, 48, 48, 0.9);
        color: #fff;
        font-size: 14px;
        line-height: 1;
        cursor: pointer;
    }
    .dash-gallery-item button:hover {
        background: #c53030;
    }
    .dash-gallery-caption {
        padding: 10px 12px;
        font-size: 12px;
        color: #7c8a94;
        border-top: 1px solid #eef1f4;
    }
</style>
@endpush

@section('topbar-actions')
    <a href="{{ route('dashboard.gallery.edit', $category) }}" class="dash-btn">Edit Category</a>
    <a href="{{ route('dashboard.gallery.index') }}" class="dash-btn dash-btn-secondary">&larr; All Categories</a>
@endsection

@section('content')
    <div class="dash-page">
        @if (session('status'))
            <div class="dash-status">{{ session('status') }}</div>
        @endif

        <div class="dash-page-header">
            <h2>Gallery Photos - {{ $category->name }}</h2>
        </div>

        <div class="dash-form-box" style="margin-bottom:20px;">
            <form action="{{ route('dashboard.gallery.images.store', $category) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="dash-form-group" style="margin-bottom:14px;">
                    <label for="gallery-images">Upload Photos</label>
                    <input
                        type="file"
                        id="gallery-images"
                        name="images[]"
                        accept="{{ \App\Support\DashboardImageUpload::ACCEPT_ATTRIBUTE }}"
                        data-dashboard-image-upload
                        data-allowed-extensions="{{ implode(',', \App\Support\DashboardImageUpload::ALLOWED_EXTENSIONS) }}"
                        data-max-size-kb="{{ \App\Support\DashboardImageUpload::MAX_FILE_SIZE_KB }}"
                        data-required-width="1080"
                        data-required-height="1350"
                        multiple
                        required
                    >
                    <p class="dash-form-hint">You can upload multiple images at once. Each image must be exactly 1080x1350 pixels. {{ \App\Support\DashboardImageUpload::HINT }}</p>
                    @error('images')
                        <p class="dash-form-error">{{ $message }}</p>
                    @enderror
                    @error('images.*')
                        <p class="dash-form-error">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="dash-btn">Upload</button>
            </form>
        </div>

        <div class="dash-table-box">
            @if ($images->isEmpty())
                <div class="dash-empty">No photos uploaded in this category yet.</div>
            @else
                <div class="dash-gallery-grid">
                    @foreach ($images as $image)
                        <div class="dash-gallery-item">
                            <div class="dash-gallery-media">
                                <img
                                    src="{{ $image->image_url ?: asset('assets/images/img14.png') }}"
                                    alt="{{ $category->name }}"
                                    loading="lazy"
                                    onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
                                >
                                <div class="dash-gallery-fallback">Image unavailable</div>
                            </div>
                            <div class="dash-gallery-caption">Photo #{{ $loop->iteration }}</div>
                            <form action="{{ route('dashboard.gallery.images.destroy', [$category, $image]) }}" method="POST" onsubmit="return confirm('Remove this photo?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" aria-label="Remove photo">&times;</button>
                            </form>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
@endsection
