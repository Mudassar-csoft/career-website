@extends('dashboard.layout')

@section('title', 'All Courses | Dashboard')

@section('topbar-actions')
    <a href="{{ route('dashboard.courses.create') }}" class="dash-btn">+ Create Course</a>
@endsection

@section('content')
    <div class="dash-page">
        @if (session('status'))
            <div class="dash-status">{{ session('status') }}</div>
        @endif

        <div class="dash-page-header">
            <h2>All Courses</h2>
        </div>

        <div class="dash-table-box">
            @if ($courses->isEmpty())
                <div class="dash-empty">No courses yet. Create your first one.</div>
            @else
                <div class="dash-table-scroll">
                    <table class="dash-table">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Mode</th>
                                <th>Duration</th>
                                <th>Certificate</th>
                                <th>Featured</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($courses as $item)
                                <tr>
                                    <td>
                                        <strong>{{ $item->title }}</strong>
                                        @if ($item->subtitle)
                                            <div style="color:#7c8a94;font-size:12px;">{{ $item->subtitle }}</div>
                                        @endif
                                    </td>
                                    <td><span class="dash-badge dash-badge-green">{{ $item->category->name }}</span></td>
                                    <td>{{ $item->mode->name }}</td>
                                    <td>{{ $item->duration_weeks ? $item->duration_weeks.' wk'.($item->duration_weeks > 1 ? 's' : '') : '—' }}</td>
                                    <td>
                                        @if ($item->has_certificate)
                                            <span class="dash-badge dash-badge-green">Included</span>
                                        @else
                                            <span class="dash-badge dash-badge-red">Excluded</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item->is_featured)
                                            <span class="dash-badge dash-badge-amber">Featured</span>
                                        @else
                                            <span class="dash-badge dash-badge-red">Not Featured</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div style="display:flex;gap:8px;">
                                            <a href="{{ route('dashboard.courses.edit', $item) }}" class="dash-btn dash-btn-secondary" style="padding:6px 12px;font-size:12px;">Edit</a>
                                            <form action="{{ route('dashboard.courses.destroy', $item) }}" method="POST" onsubmit="return confirm('Delete this course?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dash-btn dash-btn-danger" style="padding:6px 12px;font-size:12px;">Delete</button>
                                            </form>
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
