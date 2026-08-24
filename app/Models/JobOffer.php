<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobOffer extends Model
{
    protected $fillable = ['title', 'job_type', 'location', 'deadline', 'application_url'];

    protected function casts(): array
    {
        return ['deadline' => 'date'];
    }
}
