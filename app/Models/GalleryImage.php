<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GalleryImage extends Model
{
    protected $fillable = [
        'gallery_category_id',
        'image',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(GalleryCategory::class, 'gallery_category_id');
    }

    public function resolveImagePath(): ?string
    {
        $path = str_replace('\\', '/', trim((string) $this->image));

        if ($path === '') {
            return null;
        }

        if (Str::startsWith($path, ['http://', 'https://', '//'])) {
            return null;
        }

        $path = ltrim($path, '/');
        $prefixes = [
            str_replace('\\', '/', storage_path('app/public')).'/',
            str_replace('\\', '/', public_path('storage')).'/',
            'storage/app/public/',
            'app/public/',
            'public/storage/',
            'public/',
            'storage/',
        ];

        do {
            $originalPath = $path;

            foreach ($prefixes as $prefix) {
                if (Str::startsWith(Str::lower($path), Str::lower($prefix))) {
                    $path = ltrim(substr($path, strlen($prefix)), '/');
                    break;
                }
            }

            if ($path === $originalPath) {
                break;
            }
        } while (true);

        $path = ltrim($path, '/');

        if ($path === '' || str_contains($path, '..') || ! Storage::disk('public')->exists($path)) {
            return null;
        }

        return $path;
    }

    public function getImageUrlAttribute(): string
    {
        $rawPath = str_replace('\\', '/', trim((string) $this->image));

        if ($rawPath !== '' && Str::startsWith($rawPath, ['http://', 'https://', '//'])) {
            return $rawPath;
        }

        $path = $this->resolveImagePath();

        if ($path === null || ! $this->exists) {
            return '';
        }

        return route('gallery.image', [
            'image' => $this->getKey(),
            'v' => substr(sha1($path.'|'.$this->updated_at?->getTimestamp()), 0, 12),
        ], false);
    }
}
