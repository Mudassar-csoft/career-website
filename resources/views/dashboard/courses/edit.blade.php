@extends('dashboard.layout')

@section('title', 'Edit Course | Dashboard')

@push('styles')
    @include('dashboard.courses._styles')
@endpush

@section('topbar-actions')
    <a href="{{ route('dashboard.courses.index') }}" class="dash-btn dash-btn-secondary">&larr; All Courses</a>
@endsection

@section('content')
    <div class="dash-page">
        <div class="dash-page-header">
            <h2>Edit Course</h2>
        </div>

        <div class="dash-form-box" style="max-width: 920px;">
            <form action="{{ route('dashboard.courses.update', $course) }}" method="POST" id="course-form">
                @method('PUT')
                @include('dashboard.courses._form', ['course' => $course, 'categories' => $categories, 'modes' => $modes])

                <button type="submit" class="dash-btn">Update Course</button>
            </form>
        </div>
    </div>

    @include('dashboard.courses._modals')
@endsection

@push('scripts')
    @include('dashboard.courses._scripts')
@endpush
