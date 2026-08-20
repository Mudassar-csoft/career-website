<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

class Event extends Model
{
    protected $fillable = [
        'event_category_id',
        'title',
        'slug',
        'event_date',
        'campus',
        'description',
        'venue',
        'organizer',
        'is_paid',
        'fee_amount',
        'has_seat_limit',
        'seat_limit',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

    protected $casts = [
        'event_date' => 'date',
        'is_paid' => 'boolean',
        'fee_amount' => 'decimal:2',
        'has_seat_limit' => 'boolean',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(EventCategory::class, 'event_category_id');
    }

    public function registrations(): HasMany
    {
        return $this->hasMany(EventRegistration::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(EventImage::class);
    }

    public function getDisplayImagesAttribute(): Collection
    {
        if (! $this->relationLoaded('images')) {
            $this->load(['images' => fn ($query) => $query->latest()]);
        }

        return $this->images
            ->filter(fn (EventImage $image) => filled($image->image_url))
            ->values();
    }

    public function getPrimaryImageUrlAttribute(): ?string
    {
        return $this->display_images->first()?->image_url;
    }

    public function seatsRemaining(): ?int
    {
        if (! $this->has_seat_limit) {
            return null;
        }

        return max(0, $this->seat_limit - $this->registrations()->count());
    }

    public function hasSeatsAvailable(): bool
    {
        if (! $this->has_seat_limit) {
            return true;
        }

        return $this->seatsRemaining() > 0;
    }

    public function isUpcoming(): bool
    {
        return $this->event_date->isFuture() || $this->event_date->isToday();
    }
}
