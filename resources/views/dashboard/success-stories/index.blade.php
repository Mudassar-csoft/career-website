@extends('dashboard.layout')

@section('title', 'Success Stories | Dashboard')

@section('topbar-actions')
    @can('success-stories.create')
        <a href="{{ route('dashboard.success-stories.create') }}" class="dash-btn">+ Add Success Story</a>
    @endcan
@endsection

@section('content')
    <div class="dash-page">
        @if (session('status')) <div class="dash-status">{{ session('status') }}</div> @endif
        <div class="dash-page-header"><h2>Success Stories</h2></div>
        <div class="dash-table-box">
            @if ($stories->isEmpty())
                <div class="dash-empty">No success stories yet. Add the first student story.</div>
            @else
                <div class="dash-table-scroll">
                    <table class="dash-table">
                        <thead><tr><th>Photo</th><th>Student</th><th>Program</th><th>Current Role</th><th></th></tr></thead>
                        <tbody>
                            @foreach ($stories as $story)
                                <tr>
                                    <td><img class="dash-thumb" src="{{ $story->image_url }}" alt="{{ $story->name }}"></td>
                                    <td><strong>{{ $story->name }}</strong><div style="color:#7c8a94;font-size:12px;">{{ $story->location }}</div></td>
                                    <td>{{ $story->program }}</td>
                                    <td>{{ $story->role }}{{ $story->company ? ' at '.$story->company : '' }}</td>
                                    <td>
                                        <div style="display:flex;gap:8px;">
                                            @can('success-stories.edit')
                                                <a href="{{ route('dashboard.success-stories.edit', $story) }}" class="dash-btn dash-btn-secondary" style="padding:6px 12px;font-size:12px;">Edit</a>
                                            @endcan
                                            @can('success-stories.delete')
                                                <form action="{{ route('dashboard.success-stories.destroy', $story) }}" method="POST" onsubmit="return confirm('Delete this success story?');">
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
