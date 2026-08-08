@extends('dashboard.layout')

@section('title', 'All Events | Dashboard')

@section('topbar-actions')
    @can('events.create')
        <a href="{{ route('dashboard.events.create') }}" class="dash-btn">+ Create Event</a>
    @endcan
@endsection

@section('content')
    <div class="dash-page">
        @if (session('status'))
            <div class="dash-status">{{ session('status') }}</div>
        @endif

        <div class="dash-page-header">
            <h2>All Events</h2>
        </div>

        <div class="dash-table-box">
            @if ($events->isEmpty())
                <div class="dash-empty">No events yet. Create your first one.</div>
            @else
                <div class="dash-table-scroll">
                    <table class="dash-table">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Date</th>
                                <th>Campus</th>
                                <th>Fee</th>
                                <th>Seats</th>
                                <th>Registered</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($events as $item)
                                <tr>
                                    <td><strong>{{ $item->title }}</strong></td>
                                    <td><span class="dash-badge dash-badge-green">{{ $item->category->name }}</span></td>
                                    <td>{{ $item->event_date->format('M d, Y') }}</td>
                                    <td>{{ $item->campus }}</td>
                                    <td>
                                        @if ($item->is_paid)
                                            <span class="dash-badge dash-badge-amber">Rs. {{ number_format($item->fee_amount, 2) }}</span>
                                        @else
                                            <span class="dash-badge dash-badge-green">Free</span>
                                        @endif
                                    </td>
                                    <td>{{ $item->has_seat_limit ? $item->seat_limit : 'Open' }}</td>
                                    <td>{{ $item->registrations_count }}</td>
                                    <td>
                                        <div style="display:flex;gap:8px;flex-wrap:wrap;">
                                            @can('events.edit')
                                                <a href="{{ route('dashboard.events.registrants.index', $item) }}" class="dash-btn dash-btn-secondary" style="padding:6px 12px;font-size:12px;">Registrants</a>
                                                <a href="{{ route('dashboard.events.gallery.index', $item) }}" class="dash-btn dash-btn-secondary" style="padding:6px 12px;font-size:12px;">Gallery</a>
                                                <a href="{{ route('dashboard.events.edit', $item) }}" class="dash-btn dash-btn-secondary" style="padding:6px 12px;font-size:12px;">Edit</a>
                                            @endcan
                                            @can('events.delete')
                                                <form action="{{ route('dashboard.events.destroy', $item) }}" method="POST" onsubmit="return confirm('Delete this event?');">
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
