<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
        return $this->image
            ? '/storage/'.ltrim($this->image, '/')
            : '/assets/images/img58.png';
    }
}
