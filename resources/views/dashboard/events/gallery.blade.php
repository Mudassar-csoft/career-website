@extends('dashboard.layout')

@section('title', 'Gallery | '.$event->title.' | Dashboard')

@push('styles')
<style>
    .dash-gallery-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
        gap: 14px;
    }
    .dash-gallery-item {
        position: relative;
        border-radius: 10px;
        overflow: hidden;
        background: #eef1f4;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
    }
    .dash-gallery-item img {
        width: 100%;
        height: 130px;
        object-fit: cover;
        display: block;
    }
    .dash-gallery-item form {
        position: absolute;
        top: 6px;
        right: 6px;
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
</style>
@endpush

@section('topbar-actions')
    <a href="{{ route('dashboard.events.index') }}" class="dash-btn dash-btn-secondary">&larr; All Events</a>
@endsection

@section('content')
    <div class="dash-page">
        @if (session('status'))
            <div class="dash-status">{{ session('status') }}</div>
        @endif

        <div class="dash-page-header">
            <h2>Gallery — {{ $event->title }}</h2>
        </div>

        <div class="dash-form-box" style="margin-bottom:20px;">
            <form action="{{ route('dashboard.events.gallery.store', $event) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="dash-form-group" style="margin-bottom:14px;">
                    <label for="event-gallery-images">Upload Photos</label>
                    <input type="file" id="event-gallery-images" name="images[]" accept="image/*" multiple required>
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
                <div class="dash-empty">No photos uploaded yet.</div>
            @else
                <div class="dash-gallery-grid">
                    @foreach ($images as $image)
                        <div class="dash-gallery-item">
                            <img src="{{ asset('storage/'.$image->image) }}" alt="{{ $event->title }}">
                            <form action="{{ route('dashboard.events.gallery.destroy', [$event, $image]) }}" method="POST" onsubmit="return confirm('Remove this photo?');">
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
