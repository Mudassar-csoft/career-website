<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'source', 'city', 'message',
        'linkedin_url', 'institution', 'qualification', 'document_path', 'document_name',
    ];
}
