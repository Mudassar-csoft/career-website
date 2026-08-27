@extends('dashboard.layout')

@section('title', 'Exam Inquiries | Dashboard')

@section('content')
    <div class="dash-page">
        <div class="dash-page-header">
            <h2>Exam Inquiries</h2>
        </div>

        <div class="dash-table-box">
            @if ($inquiries->isEmpty())
                <div class="dash-empty">No exam scheduling requests yet.</div>
            @else
                <div class="dash-table-scroll">
                    <table class="dash-table">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Provider</th>
                                <th>Exam</th>
                                <th>Candidate</th>
                                <th>City</th>
                                <th>Preferred Date</th>
                                <th>Message</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($inquiries as $inquiry)
                                <tr>
                                    <td>{{ $inquiry->created_at->format('M d, Y g:i A') }}</td>
                                    <td>{{ $inquiry->exam_provider }}</td>
                                    <td>
                                        <strong>{{ $inquiry->exam_title }}</strong><br>
                                        <span style="font-size:12px;color:#5b6b78;">{{ $inquiry->exam_code ?: 'No code' }}</span>
                                    </td>
                                    <td><a href="mailto:{{ $inquiry->email }}">{{ $inquiry->name }}</a></td>
                                    <td>{{ $inquiry->city }}</td>
                                    <td>{{ $inquiry->preferred_date->format('d M, Y') }}</td>
                                    <td style="min-width:220px;white-space:normal;">{{ $inquiry->message ?: 'No message' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
@endsection
