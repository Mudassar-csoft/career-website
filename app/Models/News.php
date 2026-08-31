<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class News extends Model
{
    protected $fillable = ['news_type_id', 'title', 'subtitle', 'slug', 'image', 'content', 'published_at', 'meta_title', 'meta_description', 'meta_keywords'];

    protected $casts = [
        'published_at' => 'date',
    ];

    public function getPublicationDateAttribute()
    {
        return $this->published_at ?? $this->created_at;
    }

    public function getImageUrlAttribute(): string
    {
        $image = trim((string) $this->image);

        if ($image === '') {
            return asset('assets/images/img61.png');
        }

        if (filter_var($image, FILTER_VALIDATE_URL)) {
            return $image;
        }

        $storagePath = preg_replace('#^/?storage/#', '', ltrim($image, '/'));

        if (Storage::disk('public')->exists($storagePath)) {
            return Storage::disk('public')->url($storagePath);
        }

        if (is_file(public_path(ltrim($image, '/')))) {
            return asset(ltrim($image, '/'));
        }

        return asset('assets/images/img61.png');
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(NewsType::class, 'news_type_id');
    }
}
