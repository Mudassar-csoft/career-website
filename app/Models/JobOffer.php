<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JobOffer extends Model
{
    protected $fillable = ['title', 'job_type', 'location', 'deadline', 'application_url'];

    protected function casts(): array
    {
        return ['deadline' => 'date'];
    }

    public function applications(): HasMany
    {
        return $this->hasMany(JobApplication::class);
    }
}
