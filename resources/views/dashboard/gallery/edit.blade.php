@extends('dashboard.layout')

@section('title', 'Edit Gallery Category | Dashboard')

@section('topbar-actions')
    <a href="{{ route('dashboard.gallery.images.index', $category) }}" class="dash-btn">Manage Photos</a>
    <a href="{{ route('dashboard.gallery.index') }}" class="dash-btn dash-btn-secondary">&larr; All Categories</a>
@endsection

@section('content')
    <div class="dash-page">
        <div class="dash-page-header">
            <h2>Edit Gallery Category</h2>
        </div>

        <div class="dash-form-box">
            <form action="{{ route('dashboard.gallery.update', $category) }}" method="POST">
                @csrf
                @method('PUT')
                @include('dashboard.gallery._form', ['category' => $category])

                <button type="submit" class="dash-btn">Save Changes</button>
            </form>
        </div>
    </div>
@endsection
