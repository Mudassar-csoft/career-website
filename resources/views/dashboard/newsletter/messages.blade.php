@extends('dashboard.layout')

@section('title', 'Newsletter Messages | Dashboard')

@section('topbar-actions')
    <a href="{{ route('dashboard.newsletter.index') }}" class="dash-btn dash-btn-secondary">&larr; All Subscribers</a>
@endsection

@section('content')
    <div class="dash-page">
        @if (session('status'))
            <div class="dash-status">{{ session('status') }}</div>
        @endif

        <div class="dash-page-header">
            <h2>Sent Messages</h2>
        </div>

        <div class="dash-table-box">
            @if ($newsletterMessages->isEmpty())
                <div class="dash-empty">No messages sent yet. Select subscribers on the All Subscribers page to send one.</div>
            @else
                <div class="dash-table-scroll">
                    <table class="dash-table">
                        <thead>
                            <tr>
                                <th>Date &amp; Time</th>
                                <th>Channel</th>
                                <th>Title</th>
                                <th>Recipients</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($newsletterMessages as $message)
                                @php
                                    $badgeClass = match ($message->status) {
                                        'sent' => 'dash-badge-green',
                                        'partial' => 'dash-badge-amber',
                                        'blocked', 'failed' => 'dash-badge-red',
                                        default => 'dash-badge-amber',
                                    };
                                    $statusLabel = match ($message->status) {
                                        'sent' => 'Sent',
                                        'partial' => 'Partially Sent',
                                        'blocked' => 'Not Configured',
                                        'failed' => 'Failed',
                                        default => ucfirst($message->status),
                                    };
                                @endphp
                                <tr>
                                    <td>{{ $message->created_at->format('M d, Y g:i A') }}</td>
                                    <td><span class="dash-badge {{ $message->channel === 'email' ? 'dash-badge-green' : 'dash-badge-amber' }}">{{ strtoupper($message->channel) }}</span></td>
                                    <td><strong>{{ $message->title }}</strong></td>
                                    <td>
                                        <details>
                                            <summary>{{ count($message->recipients) }} recipient(s)</summary>
                                            <div style="margin-top:8px;max-width:280px;white-space:normal;font-size:12px;color:#5b6b78;">
                                                {{ implode(', ', $message->recipients) }}
                                            </div>
                                        </details>
                                    </td>
                                    <td>
                                        <span class="dash-badge {{ $badgeClass }}">{{ $statusLabel }}</span>
                                        @if ($message->status_note)
                                            <div style="font-size:11px;color:#7c8a94;margin-top:4px;white-space:normal;max-width:200px;">{{ $message->status_note }}</div>
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
