@extends('dashboard.layout')
@section('title', 'Job Offers | Dashboard')
@section('topbar-actions')
    @can('job-offers.create')<a href="{{ route('dashboard.job-offers.create') }}" class="dash-btn">+ Add Job Offer</a>@endcan
@endsection
@section('content')
    <div class="dash-page">
        @if (session('status'))<div class="dash-status">{{ session('status') }}</div>@endif
        <div class="dash-page-header"><h2>Job Offers</h2></div>
        <div class="dash-table-box">
            @if ($jobOffers->isEmpty())
                <div class="dash-empty">No job offers yet.</div>
            @else
                <div class="dash-table-scroll"><table class="dash-table">
                    <thead><tr><th>Title</th><th>Type</th><th>Location</th><th>Deadline</th><th></th></tr></thead>
                    <tbody>@foreach ($jobOffers as $jobOffer)<tr>
                        <td><strong>{{ $jobOffer->title }}</strong></td><td>{{ $jobOffer->job_type }}</td><td>{{ $jobOffer->location }}</td><td>{{ $jobOffer->deadline->format('d M, Y') }}</td>
                        <td><div style="display:flex;gap:8px;">
                            @can('job-offers.edit')<a href="{{ route('dashboard.job-offers.edit', $jobOffer) }}" class="dash-btn dash-btn-secondary" style="padding:6px 12px;font-size:12px;">Edit</a>@endcan
                            @can('job-offers.delete')<form action="{{ route('dashboard.job-offers.destroy', $jobOffer) }}" method="POST" onsubmit="return confirm('Delete this job offer?');">@csrf @method('DELETE')<button class="dash-btn dash-btn-danger" style="padding:6px 12px;font-size:12px;">Delete</button></form>@endcan
                        </div></td>
                    </tr>@endforeach</tbody>
                </table></div>
            @endif
        </div>
    </div>
@endsection
