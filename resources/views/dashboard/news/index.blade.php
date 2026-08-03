@extends('dashboard.layout')

@section('title', 'All News | Dashboard')

@section('topbar-actions')
    <a href="{{ route('dashboard.news.create') }}" class="dash-btn">+ Create News</a>
@endsection

@section('content')
    <div class="dash-page">
        @if (session('status'))
            <div class="dash-status">{{ session('status') }}</div>
        @endif

        <div class="dash-page-header">
            <h2>All News</h2>
        </div>

        <div class="dash-table-box">
            @if ($newsItems->isEmpty())
                <div class="dash-empty">No news articles yet. Create your first one.</div>
            @else
                <div class="dash-table-scroll">
                    <table class="dash-table">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Type</th>
                                <th>Date</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($newsItems as $item)
                                <tr>
                                    <td>
                                        @if ($item->image)
                                            <img class="dash-thumb" src="{{ asset('storage/'.$item->image) }}" alt="{{ $item->title }}">
                                        @else
                                            <div class="dash-thumb"></div>
                                        @endif
                                    </td>
                                    <td>
                                        <strong>{{ $item->title }}</strong>
                                        @if ($item->subtitle)
                                            <div style="color:#7c8a94;font-size:12px;">{{ $item->subtitle }}</div>
                                        @endif
                                    </td>
                                    <td><span class="dash-badge dash-badge-green">{{ $item->type->name }}</span></td>
                                    <td>{{ $item->created_at->format('M d, Y') }}</td>
                                    <td>
                                        <form action="{{ route('dashboard.news.destroy', $item) }}" method="POST" onsubmit="return confirm('Delete this news article?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dash-btn dash-btn-danger" style="padding:6px 12px;font-size:12px;">Delete</button>
                                        </form>
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
