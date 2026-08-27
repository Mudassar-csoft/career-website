<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PartnerInquiry extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'email',
        'business_interest',
        'partnership_opportunity',
    ];
}
