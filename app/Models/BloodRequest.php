<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BloodRequest extends Model
{
    protected $fillable = [
        'hospital_id',
        'tanggal_permintaan',
        'status',
        'catatan',
    ];

    protected $casts = [
        'tanggal_permintaan' => 'date',
    ];

    public function hospital()
    {
        return $this->belongsTo(\App\Models\Hospital::class);
    }


    public function items()
    {
        return $this->hasMany(BloodRequestItem::class);
    }
}
