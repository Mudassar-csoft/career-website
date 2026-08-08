@extends('layouts.app')
@section('title', $event->title.' | Career Website')
@section('body_class', 'event-detail')
@push('styles')
<style>
    .event-detail .reg-form .form-msg {
        border-radius: 8px;
        padding: 10px 14px;
        margin: 0 0 15px;
        font: 400 14px/20px "Montserrat", sans-serif;
    }
    .event-detail .reg-form .form-msg.success {
        background: #E5F8F2;
        color: #03917a;
    }
    .event-detail .reg-form .form-msg.error {
        background: #FDE8E8;
        color: #c53030;
    }
    .event-detail .reg-form label {
        display: block;
        font: 500 13px/18px "Montserrat", sans-serif;
        color: #000;
        margin: 0 0 6px;
    }
    .event-detail .reg-form .field {
        margin: 0 0 14px;
    }
    .event-detail .reg-form input {
        width: 100%;
        padding: 10px 14px;
        border: 1px solid #E1E1E1;
        border-radius: 8px;
        font: 400 14px/20px "Montserrat", sans-serif;
        outline: none;
    }
    .event-detail .reg-form input:focus {
        border-color: #03C587;
    }
    .event-detail .reg-form .field-error {
        color: #c53030;
        font-size: 12px;
        margin: 4px 0 0;
    }
    .event-detail .closed-note {
        text-align: center;
        font: 500 15px/22px "Montserrat", sans-serif;
        color: #7c8a94;
        padding: 10px 0;
    }
</style>
@endpush
@section('content')
<section class="top-banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h2>{{ $event->title }}</h2>
                <ul>
                    <li>
                        {{ $event->event_date->format('d M Y') }}
                    </li>
                    <li>
                        {{ $event->venue }}
                    </li>
                    <li>
                        {{ $event->campus }}
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="two-block">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="head-text">
                    <h2>About This Event</h2>
                </div>
                <div class="detail-text">
                    {!! $event->description !!}
                </div>
            </div>
            <div class="col-lg-5">
                <div class="side-bar">
                    <div class="box">
                        <ul>
                            <h2>Event Information</h2>
                            <li>
                                <span>Date</span>
                                <span>{{ $event->event_date->format('d M, Y') }}</span>
                            </li>
                            <li>
                                <span>Campus</span>
                                <span>{{ $event->campus }}</span>
                            </li>
                            <li>
                                <span>Venue</span>
                                <span>{{ $event->venue }}</span>
                            </li>
                            <li>
                                <span>Organizer</span>
                                <span>{{ $event->organizer }}</span>
                            </li>
                            <li>
                                <span>Category</span>
                                <span>{{ $event->category->name }}</span>
                            </li>
                            <li>
                                <span>Fee</span>
                                <span>{{ $event->is_paid ? 'Rs. '.number_format($event->fee_amount, 2) : 'Free' }}</span>
                            </li>
                            <li>
                                <span>Seats</span>
                                <span>{{ $event->has_seat_limit ? $event->seatsRemaining().' left of '.$event->seat_limit : 'Open' }}</span>
                            </li>
                        </ul>

                        @if (! $event->isUpcoming())
                            <p class="closed-note">This event has already taken place.</p>
                        @elseif (! $event->hasSeatsAvailable())
                            <p class="closed-note">This event is fully booked.</p>
                        @else
                            <div class="reg-form">
                                @if (session('status'))
                                    <p class="form-msg success">{{ session('status') }}</p>
                                @endif
                                @if ($errors->any())
                                    <p class="form-msg error">{{ $errors->first() }}</p>
                                @endif

                                <form action="{{ route('events.register', $event) }}" method="POST">
                                    @csrf
                                    <div class="field">
                                        <label for="reg-name">Full Name</label>
                                        <input type="text" id="reg-name" name="name" value="{{ old('name') }}" required>
                                        @error('name')
                                            <p class="field-error">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="field">
                                        <label for="reg-email">Email</label>
                                        <input type="email" id="reg-email" name="email" value="{{ old('email') }}" required>
                                        @error('email')
                                            <p class="field-error">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="field">
                                        <label for="reg-phone">Phone</label>
                                        <input type="text" id="reg-phone" name="phone" value="{{ old('phone') }}">
                                        @error('phone')
                                            <p class="field-error">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn rn-btn">Register Now</button>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
