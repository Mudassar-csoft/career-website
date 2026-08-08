@extends('dashboard.layout')

@section('title', 'Create Role | Dashboard')

@push('styles')
    @include('dashboard.roles._styles')
@endpush

@section('topbar-actions')
    <a href="{{ route('dashboard.roles.index') }}" class="dash-btn dash-btn-secondary">&larr; All Roles</a>
@endsection

@section('content')
    <div class="dash-page">
        <div class="dash-page-header">
            <h2>Create Role</h2>
        </div>

        <div class="dash-form-box" style="max-width: 780px;">
            <form action="{{ route('dashboard.roles.store') }}" method="POST">
                @include('dashboard.roles._form', ['role' => $role, 'permissionGroups' => $permissionGroups])

                <button type="submit" class="dash-btn">Create Role</button>
            </form>
        </div>
    </div>
@endsection
