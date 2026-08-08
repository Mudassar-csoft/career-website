@extends('dashboard.layout')

@section('title', 'All Users | Dashboard')

@section('topbar-actions')
    @can('users.create')
        <a href="{{ route('dashboard.users.create') }}" class="dash-btn">+ Create User</a>
    @endcan
@endsection

@section('content')
    <div class="dash-page">
        @if (session('status'))
            <div class="dash-status">{{ session('status') }}</div>
        @endif

        <div class="dash-page-header">
            <h2>All Users</h2>
        </div>

        <div class="dash-table-box">
            <div class="dash-table-scroll">
                <table class="dash-table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $item)
                            <tr>
                                <td>
                                    <strong>{{ $item->name }}</strong>
                                    @if ($item->id === auth()->id())
                                        <span class="dash-badge dash-badge-green">You</span>
                                    @endif
                                </td>
                                <td>{{ $item->email }}</td>
                                <td>
                                    @if ($item->role)
                                        <span class="dash-badge {{ $item->role->is_super_admin ? 'dash-badge-amber' : 'dash-badge-green' }}">{{ $item->role->name }}</span>
                                    @else
                                        <span class="dash-badge dash-badge-red">No role</span>
                                    @endif
                                </td>
                                <td>
                                    <div style="display:flex;gap:8px;">
                                        @can('users.edit')
                                            <a href="{{ route('dashboard.users.edit', $item) }}" class="dash-btn dash-btn-secondary" style="padding:6px 12px;font-size:12px;">Edit</a>
                                        @endcan
                                        @can('users.delete')
                                            @unless ($item->id === auth()->id())
                                                <form action="{{ route('dashboard.users.destroy', $item) }}" method="POST" onsubmit="return confirm('Delete this user?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dash-btn dash-btn-danger" style="padding:6px 12px;font-size:12px;">Delete</button>
                                                </form>
                                            @endunless
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
