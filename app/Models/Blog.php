<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Blog extends Model
{
    protected $fillable = ['title', 'slug', 'image', 'excerpt', 'content', 'meta_title', 'meta_description', 'meta_keywords'];

    public function images(): HasMany
    {
        return $this->hasMany(BlogImage::class)->orderBy('sort_order')->orderBy('id');
    }

    public function resolveImagePath(): ?string
    {
        $path = str_replace('\\', '/', trim((string) $this->image));

        if ($path === '') {
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
        $path = $this->resolveImagePath();

        if ($path === null || ! $this->exists) {
            return '';
        }

        return route('blogs.image', [
            'blog' => $this->getKey(),
            'v' => substr(sha1($path.'|'.$this->updated_at?->getTimestamp()), 0, 12),
        ], false);
    }
}
