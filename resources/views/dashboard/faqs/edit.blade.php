@extends('dashboard.layout')

@section('title', 'Edit FAQ | Dashboard')

@section('topbar-actions')
    <a href="{{ route('dashboard.faqs.index') }}" class="dash-btn dash-btn-secondary">&larr; All FAQs</a>
@endsection

@section('content')
    <div class="dash-page">
        <div class="dash-page-header">
            <h2>Edit FAQ</h2>
        </div>

        <div class="dash-form-box">
            <form action="{{ route('dashboard.faqs.update', $faq) }}" method="POST">
                @csrf
                @method('PUT')
                @include('dashboard.faqs._form', ['faq' => $faq, 'categories' => $categories])

                <button type="submit" class="dash-btn">Save Changes</button>
            </form>
        </div>
    </div>
@endsection
