<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BloodRequestItem extends Model
{
    protected $fillable = [
        'blood_request_id',
        'golongan_darah',
        'rhesus',
        'jumlah_diminta',
        'jumlah_disetujui',
        'hospital_id',
    ];

    public function request()
    {
        return $this->belongsTo(BloodRequest::class, 'blood_request_id');
    }
}
