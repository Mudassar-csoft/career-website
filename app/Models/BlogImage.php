<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class BlogImage extends Model
{
    protected $fillable = [
        'image',
        'sort_order',
    ];

    public function blog(): BelongsTo
    {
        return $this->belongsTo(Blog::class);
    }

    public function resolveImagePath(): ?string
    {
        $path = str_replace('\\', '/', trim((string) $this->image));

        if ($path === '') {
            return null;
        }

        $path = ltrim($path, '/');

        if ($path === '' || str_contains($path, '..') || ! Storage::disk('public')->exists($path)) {
            return null;
        }

        return $path;
    }

    public function getImageUrlAttribute(): string
    {
        $path = $this->resolveImagePath();

        if ($path === null || ! $this->exists) {
            return '';
        }

        return route('blog-images.show', [
            'image' => $this->getKey(),
            'v' => substr(sha1($path.'|'.$this->updated_at?->getTimestamp()), 0, 12),
        ], false);
    }
}
