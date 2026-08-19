@extends('dashboard.layout')

@section('title', 'Gallery Categories | Dashboard')

@section('topbar-actions')
    @can('gallery.create')
        <a href="{{ route('dashboard.gallery.create') }}" class="dash-btn">+ Add Category</a>
    @endcan
@endsection

@section('content')
    <div class="dash-page">
        @if (session('status'))
            <div class="dash-status">{{ session('status') }}</div>
        @endif

        <div class="dash-page-header">
            <h2>Gallery Categories</h2>
        </div>

        <div class="dash-table-box">
            @if ($categories->isEmpty())
                <div class="dash-empty">No gallery categories yet. Create your first one.</div>
            @else
                <div class="dash-table-scroll">
                    <table class="dash-table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Photos</th>
                                <th>Order</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td><strong>{{ $category->name }}</strong></td>
                                    <td>{{ $category->slug }}</td>
                                    <td>{{ $category->images_count }}</td>
                                    <td>{{ $category->sort_order }}</td>
                                    <td>
                                        @if ($category->is_active)
                                            <span class="dash-badge dash-badge-green">Active</span>
                                        @else
                                            <span class="dash-badge dash-badge-red">Hidden</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div style="display:flex;gap:8px;justify-content:flex-end;flex-wrap:wrap;">
                                            @can('gallery.edit')
                                                <a href="{{ route('dashboard.gallery.images.index', $category) }}" class="dash-btn" style="padding:6px 12px;font-size:12px;">Photos</a>
                                                <a href="{{ route('dashboard.gallery.edit', $category) }}" class="dash-btn dash-btn-secondary" style="padding:6px 12px;font-size:12px;">Edit</a>
                                            @endcan
                                            @can('gallery.delete')
                                                <form action="{{ route('dashboard.gallery.destroy', $category) }}" method="POST" onsubmit="return confirm('Delete this category and all its photos?');">
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
