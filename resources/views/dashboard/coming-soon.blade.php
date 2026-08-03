@extends('dashboard.layout')

@section('title', $label.' | Dashboard')

@section('content')
    <div class="dash-panel">
        <span class="dash-soon-badge">Coming soon</span>
        <h2>{{ $label }}</h2>
        <p>This section hasn't been built yet.</p>
    </div>
@endsection
