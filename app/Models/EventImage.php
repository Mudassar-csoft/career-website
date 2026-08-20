<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EventImage extends Model
{
    protected $fillable = ['event_id', 'image'];

    public function getImageUrlAttribute(): string
    {
        $path = str_replace('\\', '/', trim((string) $this->image));

        if ($path === '') {
            return '';
        }

        if (Str::startsWith($path, ['http://', 'https://', '//'])) {
            return $path;
        }

        $path = ltrim($path, '/');

        foreach (['storage/app/public/', 'app/public/', 'public/'] as $prefix) {
            if (Str::startsWith($path, $prefix)) {
                $path = Str::after($path, $prefix);
                break;
            }
        }

        if (Str::startsWith($path, 'storage/')) {
            $path = Str::after($path, 'storage/');
        }

        $path = ltrim($path, '/');

        if ($path === '' || str_contains($path, '..') || ! Storage::disk('public')->exists($path)) {
            return '';
        }

        return route('events.image', ['image' => $this->getKey()], false);
    }

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
}
