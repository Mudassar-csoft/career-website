<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JobApplication extends Model
{
    protected $fillable = [
        'job_offer_id', 'job_title', 'name', 'email', 'phone', 'linkedin_url',
        'institution', 'city', 'qualification', 'document_path', 'document_name',
    ];

    public function jobOffer(): BelongsTo
    {
        return $this->belongsTo(JobOffer::class);
    }
}
