@extends('dashboard.layout')

@section('title', 'Registrants | '.$event->title.' | Dashboard')

@section('topbar-actions')
    <a href="{{ route('dashboard.events.index') }}" class="dash-btn dash-btn-secondary">&larr; All Events</a>
@endsection

@section('content')
    <div class="dash-page">
        @if (session('status'))
            <div class="dash-status">{{ session('status') }}</div>
        @endif

        <div class="dash-page-header">
            <h2>Registrants — {{ $event->title }}</h2>
        </div>

        <div class="dash-table-box" style="margin-bottom:16px;">
            <p style="margin:0;font-size:13px;color:#7c8a94;">
                {{ $registrations->count() }} registered
                @if ($event->has_seat_limit)
                    of {{ $event->seat_limit }} seats
                @endif
                &middot;
                {{ $registrations->where('status', 'participant')->count() }} participant(s)
                &middot;
                {{ $registrations->where('status', 'pending')->count() }} pending
            </p>
        </div>

        <div class="dash-table-box">
            @if ($registrations->isEmpty())
                <div class="dash-empty">No one has registered for this event yet.</div>
            @else
                <div class="dash-table-scroll">
                    <table class="dash-table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Status</th>
                                <th>Fee Proof</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($registrations as $registration)
                                <tr>
                                    <td><strong>{{ $registration->name }}</strong></td>
                                    <td>{{ $registration->email }}</td>
                                    <td>{{ $registration->phone ?: '—' }}</td>
                                    <td>
                                        @if ($registration->isParticipant())
                                            <span class="dash-badge dash-badge-green">Participant</span>
                                        @else
                                            <span class="dash-badge dash-badge-amber">Pending</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($registration->fee_proof)
                                            <a href="{{ asset('storage/'.$registration->fee_proof) }}" target="_blank" rel="noopener">View Proof</a>
                                        @elseif ($event->is_paid)
                                            <span style="color:#9aa7b0;">Not submitted</span>
                                        @else
                                            <span style="color:#9aa7b0;">—</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($event->is_paid && ! $registration->isParticipant())
                                            <form action="{{ route('dashboard.events.registrants.clear-fee', [$event, $registration]) }}" method="POST" onsubmit="return confirm('Mark this fee as cleared and email the pass?');">
                                                @csrf
                                                <button type="submit" class="dash-btn" style="padding:6px 12px;font-size:12px;">Mark Fee Cleared</button>
                                            </form>
                                        @endif
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
