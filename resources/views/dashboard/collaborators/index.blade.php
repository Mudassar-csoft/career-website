@extends('dashboard.layout')

@section('title', 'All Collaborators | Dashboard')

@section('topbar-actions')
    @can('collaborators.create')
        <a href="{{ route('dashboard.collaborators.create') }}" class="dash-btn">+ Add Collaborator</a>
    @endcan
@endsection

@section('content')
    <div class="dash-page">
        @if (session('status'))
            <div class="dash-status">{{ session('status') }}</div>
        @endif

        <div class="dash-page-header">
            <h2>All Collaborators</h2>
        </div>

        <div class="dash-table-box">
            @if ($collaborators->isEmpty())
                <div class="dash-empty">No collaborators yet. Add your first one.</div>
            @else
                <div class="dash-table-scroll">
                    <table class="dash-table">
                        <thead>
                            <tr>
                                <th>Logo</th>
                                <th>Name</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($collaborators as $item)
                                <tr>
                                    <td><img class="dash-thumb" style="background:#fff;object-fit:contain;" src="{{ asset('storage/'.$item->logo) }}" alt="{{ $item->name }}"></td>
                                    <td><strong>{{ $item->name }}</strong></td>
                                    <td>
                                        <div style="display:flex;gap:8px;">
                                            @can('collaborators.edit')
                                                <a href="{{ route('dashboard.collaborators.edit', $item) }}" class="dash-btn dash-btn-secondary" style="padding:6px 12px;font-size:12px;">Edit</a>
                                            @endcan
                                            @can('collaborators.delete')
                                                <form action="{{ route('dashboard.collaborators.destroy', $item) }}" method="POST" onsubmit="return confirm('Delete this collaborator?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dash-btn dash-btn-danger" style="padding:6px 12px;font-size:12px;">Delete</button>
                                                </form>
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
@endsection
