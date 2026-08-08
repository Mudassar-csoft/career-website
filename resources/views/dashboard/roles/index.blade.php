@extends('dashboard.layout')

@section('title', 'All Roles | Dashboard')

@section('topbar-actions')
    @can('roles.create')
        <a href="{{ route('dashboard.roles.create') }}" class="dash-btn">+ Create Role</a>
    @endcan
@endsection

@section('content')
    <div class="dash-page">
        @if (session('status'))
            <div class="dash-status">{{ session('status') }}</div>
        @endif

        <div class="dash-page-header">
            <h2>All Roles</h2>
        </div>

        <div class="dash-table-box">
            <div class="dash-table-scroll">
                <table class="dash-table">
                    <thead>
                        <tr>
                            <th>Role</th>
                            <th>Permissions</th>
                            <th>Users</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                            <tr>
                                <td>
                                    <strong>{{ $role->name }}</strong>
                                    @if ($role->is_super_admin)
                                        <span class="dash-badge dash-badge-amber">Built-in — full access</span>
                                    @endif
                                </td>
                                <td>{{ $role->is_super_admin ? 'All' : $role->permissions_count }}</td>
                                <td>{{ $role->users_count }}</td>
                                <td>
                                    @unless ($role->is_super_admin)
                                        <div style="display:flex;gap:8px;">
                                            @can('roles.edit')
                                                <a href="{{ route('dashboard.roles.edit', $role) }}" class="dash-btn dash-btn-secondary" style="padding:6px 12px;font-size:12px;">Edit</a>
                                            @endcan
                                            @can('roles.delete')
                                                <form action="{{ route('dashboard.roles.destroy', $role) }}" method="POST" onsubmit="return confirm('Delete this role?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dash-btn dash-btn-danger" style="padding:6px 12px;font-size:12px;">Delete</button>
                                                </form>
                                            @endcan
                                        </div>
                                    @endunless
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
