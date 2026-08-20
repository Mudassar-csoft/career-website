<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Course extends Model
{
    protected $fillable = [
        'course_category_id',
        'course_mode_id',
        'title',
        'subtitle',
        'slug',
        'image',
        'duration_weeks',
        'about',
        'what_you_will_learn',
        'tools_technology',
        'course_includes',
        'curriculum',
        'has_certificate',
        'is_featured',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

    protected $casts = [
        'what_you_will_learn' => 'array',
        'tools_technology' => 'array',
        'course_includes' => 'array',
        'curriculum' => 'array',
        'has_certificate' => 'boolean',
        'is_featured' => 'boolean',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(CourseCategory::class, 'course_category_id');
    }

    public function mode(): BelongsTo
    {
        return $this->belongsTo(CourseMode::class, 'course_mode_id');
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

        return route('courses.image', [
            'course' => $this->getKey(),
            'v' => substr(sha1($path.'|'.$this->updated_at?->getTimestamp()), 0, 12),
        ], false);
    }
}
