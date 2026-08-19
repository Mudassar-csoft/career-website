@extends('dashboard.layout')

@section('title', 'FAQs | Dashboard')

@section('topbar-actions')
    @can('faqs.create')
        <a href="{{ route('dashboard.faqs.categories.index') }}" class="dash-btn dash-btn-secondary">Categories</a>
        <a href="{{ route('dashboard.faqs.create') }}" class="dash-btn">+ Add FAQ</a>
    @endcan
@endsection

@section('content')
    <div class="dash-page">
        @if (session('status'))
            <div class="dash-status">{{ session('status') }}</div>
        @endif

        <div class="dash-page-header">
            <h2>All FAQs</h2>
        </div>

        <div class="dash-table-box">
            @if ($faqs->isEmpty())
                <div class="dash-empty">No FAQs yet. Create your first question.</div>
            @else
                <div class="dash-table-scroll">
                    <table class="dash-table">
                        <thead>
                            <tr>
                                <th>Question</th>
                                <th>Category</th>
                                <th>Order</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($faqs as $faq)
                                <tr>
                                    <td>
                                        <strong>{{ $faq->question }}</strong>
                                        <div style="color:#7c8a94;font-size:12px;">{{ \Illuminate\Support\Str::limit($faq->answer, 90) }}</div>
                                    </td>
                                    <td>{{ $faq->category?->name ?? 'Uncategorized' }}</td>
                                    <td>{{ $faq->sort_order }}</td>
                                    <td>
                                        @if ($faq->is_active)
                                            <span class="dash-badge dash-badge-green">Active</span>
                                        @else
                                            <span class="dash-badge dash-badge-red">Hidden</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div style="display:flex;gap:8px;justify-content:flex-end;flex-wrap:wrap;">
                                            @can('faqs.edit')
                                                <a href="{{ route('dashboard.faqs.edit', $faq) }}" class="dash-btn dash-btn-secondary" style="padding:6px 12px;font-size:12px;">Edit</a>
                                            @endcan
                                            @can('faqs.delete')
                                                <form action="{{ route('dashboard.faqs.destroy', $faq) }}" method="POST" onsubmit="return confirm('Delete this FAQ?');">
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
