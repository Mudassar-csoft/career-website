<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
}
