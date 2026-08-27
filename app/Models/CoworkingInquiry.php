<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CoworkingInquiry extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'city',
        'interested_in',
        'number_of_persons',
    ];
}
