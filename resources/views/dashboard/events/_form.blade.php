@csrf

<div class="dash-form-row">
    <div class="dash-form-group">
        <label for="event-title">Event Title</label>
        <input type="text" id="event-title" name="title" value="{{ old('title', $event->title) }}" required>
        @error('title')
            <p class="dash-form-error">{{ $message }}</p>
        @enderror
    </div>
    <div class="dash-form-group">
        <label for="event-slug">Slug</label>
        <input type="text" id="event-slug" name="slug" value="{{ old('slug', $event->slug) }}" required>
        <p class="dash-form-hint">Auto-filled from the title — edit if needed.</p>
        @error('slug')
            <p class="dash-form-error">{{ $message }}</p>
        @enderror
    </div>
</div>

<div class="dash-form-row">
    <div class="dash-form-group">
        <label for="event-date">Date</label>
        <input type="date" id="event-date" name="event_date" value="{{ old('event_date', optional($event->event_date)->format('Y-m-d')) }}" required>
        @error('event_date')
            <p class="dash-form-error">{{ $message }}</p>
        @enderror
    </div>
    <div class="dash-form-group">
        <label for="event-category">Category</label>
        <div class="dash-type-row">
            <select id="event-category" name="event_category_id" required>
                <option value="">Select a category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @selected(old('event_category_id', $event->event_category_id) == $category->id)>{{ $category->name }}</option>
                @endforeach
            </select>
            <button type="button" class="dash-icon-btn-add" id="event-category-add-btn" aria-label="Add category">+</button>
        </div>
        @error('event_category_id')
            <p class="dash-form-error">{{ $message }}</p>
        @enderror
    </div>
</div>

<div class="dash-form-row">
    <div class="dash-form-group">
        <label for="event-campus">Campus</label>
        <input type="text" id="event-campus" name="campus" value="{{ old('campus', $event->campus) }}" placeholder="e.g. Lahore Wapda Town" required>
        @error('campus')
            <p class="dash-form-error">{{ $message }}</p>
        @enderror
    </div>
    <div class="dash-form-group">
        <label for="event-venue">Venue</label>
        <input type="text" id="event-venue" name="venue" value="{{ old('venue', $event->venue) }}" placeholder="e.g. Main Auditorium" required>
        @error('venue')
            <p class="dash-form-error">{{ $message }}</p>
        @enderror
    </div>
</div>

<div class="dash-form-group">
    <label for="event-organizer">Organizer</label>
    <input type="text" id="event-organizer" name="organizer" value="{{ old('organizer', $event->organizer) }}" placeholder="e.g. Career Institute" required>
    @error('organizer')
        <p class="dash-form-error">{{ $message }}</p>
    @enderror
</div>

<div class="dash-form-group">
    <label for="event-description">Description</label>
    <textarea id="event-description" name="description" rows="8">{{ old('description', $event->description) }}</textarea>
    @error('description')
        <p class="dash-form-error">{{ $message }}</p>
    @enderror
</div>

@php
    $isPaid = old('is_paid', $event->is_paid ? '1' : '0');
    $hasSeatLimit = old('has_seat_limit', $event->has_seat_limit ? '1' : '0');
@endphp
<div class="dash-form-row">
    <div class="dash-form-group">
        <label for="event-is-paid">Fee</label>
        <select id="event-is-paid" name="is_paid" required>
            <option value="0" @selected($isPaid == '0')>Free</option>
            <option value="1" @selected($isPaid == '1')>Paid</option>
        </select>
        @error('is_paid')
            <p class="dash-form-error">{{ $message }}</p>
        @enderror
    </div>
    <div class="dash-form-group" id="event-fee-amount-group" style="{{ $isPaid == '1' ? '' : 'display:none;' }}">
        <label for="event-fee-amount">Fee Amount</label>
        <input type="number" id="event-fee-amount" name="fee_amount" min="0" step="0.01" value="{{ old('fee_amount', $event->fee_amount) }}" placeholder="e.g. 1500">
        @error('fee_amount')
            <p class="dash-form-error">{{ $message }}</p>
        @enderror
    </div>
</div>

<div class="dash-form-row">
    <div class="dash-form-group">
        <label for="event-has-seat-limit">Seats</label>
        <select id="event-has-seat-limit" name="has_seat_limit" required>
            <option value="0" @selected($hasSeatLimit == '0')>Open (unlimited)</option>
            <option value="1" @selected($hasSeatLimit == '1')>Limited</option>
        </select>
        @error('has_seat_limit')
            <p class="dash-form-error">{{ $message }}</p>
        @enderror
    </div>
    <div class="dash-form-group" id="event-seat-limit-group" style="{{ $hasSeatLimit == '1' ? '' : 'display:none;' }}">
        <label for="event-seat-limit">Number of Seats</label>
        <input type="number" id="event-seat-limit" name="seat_limit" min="1" value="{{ old('seat_limit', $event->seat_limit) }}" placeholder="e.g. 200">
        @error('seat_limit')
            <p class="dash-form-error">{{ $message }}</p>
        @enderror
    </div>
</div>

<div class="dash-form-group" style="margin-top:8px;padding-top:24px;border-top:1px solid #eef1f4;">
    <label style="font-size:15px;">SEO Settings</label>
    <p class="dash-form-hint">Controls how this event appears in search engine results. Leave blank to use sensible defaults.</p>
</div>

<div class="dash-form-group">
    <label for="event-meta-title">Meta Title</label>
    <input type="text" id="event-meta-title" name="meta_title" value="{{ old('meta_title', $event->meta_title) }}" maxlength="255" placeholder="Defaults to the event title if left blank">
    @error('meta_title')
        <p class="dash-form-error">{{ $message }}</p>
    @enderror
</div>

<div class="dash-form-group">
    <label for="event-meta-description">Meta Description</label>
    <textarea id="event-meta-description" name="meta_description" rows="3" maxlength="500" placeholder="Shown under the title in search results — aim for 150-160 characters.">{{ old('meta_description', $event->meta_description) }}</textarea>
    @error('meta_description')
        <p class="dash-form-error">{{ $message }}</p>
    @enderror
</div>

<div class="dash-form-group">
    <label for="event-meta-keywords">Meta Keywords</label>
    <input type="text" id="event-meta-keywords" name="meta_keywords" value="{{ old('meta_keywords', $event->meta_keywords) }}" placeholder="Comma-separated, e.g. digital marketing workshop, career institute event">
    @error('meta_keywords')
        <p class="dash-form-error">{{ $message }}</p>
    @enderror
</div>
