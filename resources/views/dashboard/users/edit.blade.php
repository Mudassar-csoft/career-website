@extends('dashboard.layout')

@section('title', 'Edit User | Dashboard')

@section('topbar-actions')
    <a href="{{ route('dashboard.users.index') }}" class="dash-btn dash-btn-secondary">&larr; All Users</a>
@endsection

@section('content')
    <div class="dash-page">
        <div class="dash-page-header">
            <h2>Edit User</h2>
        </div>

        <div class="dash-form-box">
            <form action="{{ route('dashboard.users.update', $user) }}" method="POST">
                @method('PUT')
                @include('dashboard.users._form', ['user' => $user, 'roles' => $roles])

                <button type="submit" class="dash-btn">Update User</button>
            </form>
        </div>
    </div>
@endsection
