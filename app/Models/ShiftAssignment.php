<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShiftAssignment extends Model
{
    protected $table = 'shift_user';

    protected $fillable = [
        'shift_id',
        'user_id',
        'tanggal',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    // 🔗 RELATIONS
    public function shift()
    {
        return $this->belongsTo(Shift::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
