@extends('dashboard.layout')

@section('title', 'All Blogs | Dashboard')

@section('topbar-actions')
    @can('blogs.create')
        <a href="{{ route('dashboard.blogs.create') }}" class="dash-btn">+ Create Blog</a>
    @endcan
@endsection

@section('content')
    <div class="dash-page">
        @if (session('status'))
            <div class="dash-status">{{ session('status') }}</div>
        @endif

        <div class="dash-page-header">
            <h2>All Blogs</h2>
        </div>

        <div class="dash-table-box">
            @if ($blogs->isEmpty())
                <div class="dash-empty">No blog posts yet. Create your first one.</div>
            @else
                <div class="dash-table-scroll">
                    <table class="dash-table">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Date</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($blogs as $item)
                                <tr>
                                    <td>
                                        <img
                                            class="dash-thumb"
                                            src="{{ $item->image_url ?: asset('assets/images/img13.png') }}"
                                            alt="{{ $item->title }}"
                                            loading="lazy"
                                            onerror="this.src='{{ asset('assets/images/img13.png') }}'; this.onerror=null;"
                                        >
                                    </td>
                                    <td>
                                        <strong>{{ $item->title }}</strong>
                                        @if ($item->excerpt)
                                            <div style="color:#7c8a94;font-size:12px;">{{ \Illuminate\Support\Str::limit($item->excerpt, 70) }}</div>
                                        @endif
                                    </td>
                                    <td>{{ $item->created_at->format('M d, Y') }}</td>
                                    <td>
                                        <div style="display:flex;gap:8px;">
                                            @can('blogs.edit')
                                                <a href="{{ route('dashboard.blogs.edit', $item) }}" class="dash-btn dash-btn-secondary" style="padding:6px 12px;font-size:12px;">Edit</a>
                                            @endcan
                                            @can('blogs.delete')
                                                <form action="{{ route('dashboard.blogs.destroy', $item) }}" method="POST" onsubmit="return confirm('Delete this blog post?');">
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
