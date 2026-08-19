@extends('dashboard.layout')

@section('title', 'Create Gallery Category | Dashboard')

@section('topbar-actions')
    <a href="{{ route('dashboard.gallery.index') }}" class="dash-btn dash-btn-secondary">&larr; All Categories</a>
@endsection

@section('content')
    <div class="dash-page">
        <div class="dash-page-header">
            <h2>Create Gallery Category</h2>
        </div>

        <div class="dash-form-box">
            <form action="{{ route('dashboard.gallery.store') }}" method="POST">
                @csrf
                @include('dashboard.gallery._form', ['category' => $category])

                <button type="submit" class="dash-btn">Create Category</button>
            </form>
        </div>
    </div>
@endsection
