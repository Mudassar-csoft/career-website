@extends('dashboard.layout')

@section('title', 'Create FAQ | Dashboard')

@section('topbar-actions')
    <a href="{{ route('dashboard.faqs.index') }}" class="dash-btn dash-btn-secondary">&larr; All FAQs</a>
@endsection

@section('content')
    <div class="dash-page">
        <div class="dash-page-header">
            <h2>Create FAQ</h2>
        </div>

        <div class="dash-form-box">
            <form action="{{ route('dashboard.faqs.store') }}" method="POST">
                @csrf
                @include('dashboard.faqs._form', ['faq' => $faq, 'categories' => $categories])

                <button type="submit" class="dash-btn">Create FAQ</button>
            </form>
        </div>
    </div>
@endsection
