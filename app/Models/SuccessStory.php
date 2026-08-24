<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SuccessStory extends Model
{
    protected $fillable = [
        'name',
        'program',
        'location',
        'role',
        'company',
        'before_story',
        'after_story',
        'journey_steps',
        'image',
    ];

    protected $casts = [
        'journey_steps' => 'array',
    ];

    public function getImageUrlAttribute(): string
    {
        $path = $this->resolveImagePath();

        if ($path === null || ! $this->exists) {
            return '/assets/images/img58.png';
        }

        return route('success-stories.image', [
            'successStory' => $this->getKey(),
            'v' => substr(sha1($path.'|'.$this->updated_at?->getTimestamp()), 0, 12),
        ], false);
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
}
