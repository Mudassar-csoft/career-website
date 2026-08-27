@extends('dashboard.layout')

@section('title', 'Coworking Inquiries | Dashboard')

@section('content')
    <div class="dash-page">
        <div class="dash-page-header">
            <h2>Coworking Inquiries</h2>
        </div>

        <div class="dash-table-box">
            @if ($inquiries->isEmpty())
                <div class="dash-empty">No coworking inquiries yet.</div>
            @else
                <div class="dash-table-scroll">
                    <table class="dash-table">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Name</th>
                                <th>Contact</th>
                                <th>City</th>
                                <th>Interested In</th>
                                <th>Persons</th>
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
                                    <td>{{ $inquiry->city }}</td>
                                    <td>{{ $inquiry->interested_in }}</td>
                                    <td>{{ $inquiry->number_of_persons }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
@endsection
