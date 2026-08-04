@extends('dashboard.layout')

@section('title', 'Create Course | Dashboard')

@push('styles')
    @include('dashboard.courses._styles')
@endpush

@section('topbar-actions')
    <a href="{{ route('dashboard.courses.index') }}" class="dash-btn dash-btn-secondary">&larr; All Courses</a>
@endsection

@section('content')
    <div class="dash-page">
        <div class="dash-page-header">
            <h2>Create Course</h2>
        </div>

        <div class="dash-form-box" style="max-width: 920px;">
            <form action="{{ route('dashboard.courses.store') }}" method="POST" id="course-form">
                @include('dashboard.courses._form', ['course' => $course, 'categories' => $categories, 'modes' => $modes])

                <button type="submit" class="dash-btn">Publish Course</button>
            </form>
        </div>
    </div>

    @include('dashboard.courses._modals')
@endsection

@push('scripts')
    @include('dashboard.courses._scripts')
@endpush
