@extends('dashboard.layout')

@section('title', 'All Alumni | Dashboard')

@section('topbar-actions')
    @can('alumni.create')
        <a href="{{ route('dashboard.alumni.create') }}" class="dash-btn">+ Add Alumni</a>
    @endcan
@endsection

@section('content')
    <div class="dash-page">
        @if (session('status'))
            <div class="dash-status">{{ session('status') }}</div>
        @endif

        <div class="dash-page-header">
            <h2>All Alumni</h2>
        </div>

        <div class="dash-table-box">
            @if ($alumni->isEmpty())
                <div class="dash-empty">No alumni reviews yet. Add your first one.</div>
            @else
                <div class="dash-table-scroll">
                    <table class="dash-table">
                        <thead>
                            <tr>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Designation</th>
                                <th>Review</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($alumni as $item)
                                <tr>
                                    <td>
                                        @if ($item->photo)
                                            <img class="dash-thumb" style="border-radius:50%;" src="{{ asset('storage/'.$item->photo) }}" alt="{{ $item->name }}">
                                        @else
                                            <div class="dash-thumb" style="border-radius:50%;"></div>
                                        @endif
                                    </td>
                                    <td><strong>{{ $item->name }}</strong></td>
                                    <td>{{ $item->designation }}</td>
                                    <td style="max-width:320px;white-space:normal;">{{ \Illuminate\Support\Str::limit($item->review, 90) }}</td>
                                    <td>
                                        <div style="display:flex;gap:8px;">
                                            @can('alumni.edit')
                                                <a href="{{ route('dashboard.alumni.edit', $item) }}" class="dash-btn dash-btn-secondary" style="padding:6px 12px;font-size:12px;">Edit</a>
                                            @endcan
                                            @can('alumni.delete')
                                                <form action="{{ route('dashboard.alumni.destroy', $item) }}" method="POST" onsubmit="return confirm('Delete this alumni review?');">
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
