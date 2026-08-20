@extends('dashboard.layout')

@section('title', 'Create Event | Dashboard')

@section('topbar-actions')
    <a href="{{ route('dashboard.events.index') }}" class="dash-btn dash-btn-secondary">&larr; All Events</a>
@endsection

@section('content')
    <div class="dash-page">
        <div class="dash-page-header">
            <h2>Create Event</h2>
        </div>

        <div class="dash-form-box" style="max-width: 920px;">
            <form action="{{ route('dashboard.events.store') }}" method="POST" enctype="multipart/form-data">
                @include('dashboard.events._form', ['event' => $event, 'categories' => $categories])

                <button type="submit" class="dash-btn">Publish Event</button>
            </form>
        </div>
    </div>

    @include('dashboard.events._modals')
@endsection

@push('scripts')
    @include('dashboard.events._scripts')
@endpush
