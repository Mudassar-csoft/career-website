<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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
        return $this->image && Storage::disk('public')->exists($this->image)
            ? asset('storage/'.$this->image)
            : asset('assets/images/img58.png');
    }
}
