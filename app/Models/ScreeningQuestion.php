<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ScreeningQuestion extends Model
{
    protected $fillable = [
        'question',
        'code',
        'order',
        'is_active',
    ];
}
