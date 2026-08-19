@extends('dashboard.layout')

@section('title', 'FAQ Categories | Dashboard')

@section('topbar-actions')
    @can('faqs.create')
        <a href="{{ route('dashboard.faqs.index') }}" class="dash-btn dash-btn-secondary">All FAQs</a>
        <a href="{{ route('dashboard.faqs.categories.create') }}" class="dash-btn">+ Add Category</a>
    @endcan
@endsection

@section('content')
    <div class="dash-page">
        @if (session('status'))
            <div class="dash-status">{{ session('status') }}</div>
        @endif

        <div class="dash-page-header">
            <h2>FAQ Categories</h2>
        </div>

        <div class="dash-table-box">
            @if ($categories->isEmpty())
                <div class="dash-empty">No FAQ categories yet. Create your first one.</div>
            @else
                <div class="dash-table-scroll">
                    <table class="dash-table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Questions</th>
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
                                    <td>{{ $category->faqs_count }}</td>
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
                                            @can('faqs.edit')
                                                <a href="{{ route('dashboard.faqs.categories.edit', $category) }}" class="dash-btn dash-btn-secondary" style="padding:6px 12px;font-size:12px;">Edit</a>
                                            @endcan
                                            @can('faqs.delete')
                                                <form action="{{ route('dashboard.faqs.categories.destroy', $category) }}" method="POST" onsubmit="return confirm('Delete this category and all its FAQs?');">
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
