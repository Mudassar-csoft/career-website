<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExamInquiry extends Model
{
    protected $fillable = [
        'exam_provider',
        'exam_title',
        'exam_code',
        'name',
        'email',
        'city',
        'preferred_date',
        'message',
    ];

    protected $casts = [
        'preferred_date' => 'date',
    ];
}
