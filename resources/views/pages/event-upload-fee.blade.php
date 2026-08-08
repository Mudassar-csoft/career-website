@extends('layouts.app')
@section('title', 'Upload Payment Receipt | Career Website')
@section('body_class', 'event-detail')
@push('styles')
<style>
    .fee-upload-wrap {
        max-width: 520px;
        margin: 0 auto;
    }
    .fee-upload-wrap .box {
        padding: 24px;
        border-radius: 10px;
        background: #F0F9FF;
    }
    .fee-upload-wrap h2 {
        font: 600 22px/28px "Montserrat", sans-serif;
        margin: 0 0 6px;
        color: #000;
    }
    .fee-upload-wrap .sub {
        font: 400 14px/20px "Montserrat", sans-serif;
        color: #7c8a94;
        margin: 0 0 20px;
    }
    .fee-upload-wrap ul {
        padding: 15px;
        background: #fff;
        border-radius: 10px;
        margin: 0 0 20px;
        list-style: none;
    }
    .fee-upload-wrap ul li {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 0 12px;
        margin: 0 0 12px;
        border-bottom: 1px solid #E1E1E1;
        font: 400 14px/18px "Montserrat", sans-serif;
    }
    .fee-upload-wrap ul li:last-child {
        margin: 0;
        border: 0;
        padding: 0;
    }
    .fee-upload-wrap .form-msg {
        border-radius: 8px;
        padding: 10px 14px;
        margin: 0 0 15px;
        font: 400 14px/20px "Montserrat", sans-serif;
    }
    .fee-upload-wrap .form-msg.success {
        background: #E5F8F2;
        color: #03917a;
    }
    .fee-upload-wrap .form-msg.error {
        background: #FDE8E8;
        color: #c53030;
    }
    .fee-upload-wrap input[type="file"] {
        width: 100%;
        padding: 10px 14px;
        border: 1px solid #E1E1E1;
        border-radius: 8px;
        background: #fff;
        margin: 0 0 14px;
    }
</style>
@endpush
@section('content')
<section class="two-block">
    <div class="container">
        <div class="fee-upload-wrap">
            <div class="box">
                <h2>{{ $registration->event->title }}</h2>
                <p class="sub">Hi {{ $registration->name }}, upload your payment receipt below to confirm your seat.</p>

                <ul>
                    <li><span>Date</span><span>{{ $registration->event->event_date->format('d M, Y') }}</span></li>
                    <li><span>Venue</span><span>{{ $registration->event->venue }}</span></li>
                    <li><span>Amount Due</span><span>Rs. {{ number_format($registration->event->fee_amount, 2) }}</span></li>
                    <li><span>Status</span><span>{{ $registration->isParticipant() ? 'Cleared' : ($registration->fee_proof ? 'Awaiting review' : 'Not submitted') }}</span></li>
                </ul>

                @if (session('status'))
                    <p class="form-msg success">{{ session('status') }}</p>
                @endif
                @if ($errors->any())
                    <p class="form-msg error">{{ $errors->first() }}</p>
                @endif

                @if ($registration->isParticipant())
                    <p class="sub" style="margin:0;">Your fee is confirmed — check your email for your event pass.</p>
                @else
                    <form action="{{ route('events.upload-fee', $registration->token) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="fee_proof" accept="image/*,.pdf" required>
                        <button type="submit" class="btn rn-btn" style="width:100%;">{{ $registration->fee_proof ? 'Re-upload Receipt' : 'Upload Receipt' }}</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
