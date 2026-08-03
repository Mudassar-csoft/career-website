<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class News extends Model
{
    protected $fillable = ['news_type_id', 'title', 'subtitle', 'slug', 'image', 'content'];

    public function type(): BelongsTo
    {
        return $this->belongsTo(NewsType::class, 'news_type_id');
    }
}
