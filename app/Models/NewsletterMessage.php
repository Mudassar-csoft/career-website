<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsletterMessage extends Model
{
    protected $fillable = ['channel', 'title', 'body', 'recipients', 'status', 'status_note', 'sent_at'];

    protected $casts = [
        'recipients' => 'array',
        'sent_at' => 'datetime',
    ];
}
