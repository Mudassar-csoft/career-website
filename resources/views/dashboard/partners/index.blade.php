@extends('dashboard.layout')

@section('title', 'Partner Inquiries | Dashboard')

@section('content')
    <div class="dash-page">
        @if (session('status'))
            <div class="dash-status">{{ session('status') }}</div>
        @endif

        <div class="dash-page-header">
            <h2>Partner Inquiries</h2>
        </div>

        <div class="dash-table-box">
            @if ($inquiries->isEmpty())
                <div class="dash-empty">No partnership inquiries yet.</div>
            @else
                <div class="dash-table-scroll">
                    <table class="dash-table">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Name</th>
                                <th>Contact</th>
                                <th>Business Interest</th>
                                <th>Opportunity</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($inquiries as $inquiry)
                                <tr>
                                    <td>{{ $inquiry->created_at->format('M d, Y g:i A') }}</td>
                                    <td><strong>{{ $inquiry->name }}</strong></td>
                                    <td>
                                        <a href="mailto:{{ $inquiry->email }}">{{ $inquiry->email }}</a><br>
                                        <span style="font-size:12px;color:#5b6b78;">{{ $inquiry->phone }}</span>
                                    </td>
                                    <td>{{ $inquiry->business_interest }}</td>
                                    <td style="min-width:280px;white-space:normal;">{{ $inquiry->partnership_opportunity }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
@endsection
