<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BloodInRecord extends Model
{
    protected $fillable = [
        'pendonor_id',
        'mobile_unit_id',
        'tanggal_donor',
        'golongan_darah',
        'rhesus',
        'jumlah_kantong',
        'status',
        'petugas_id',
        'catatan',
    ];

    protected $casts = [
        'tanggal_donor' => 'date',
    ];

    public function pendonor()
    {
        return $this->belongsTo(Pendonor::class);
    }

    public function mobileUnit()
    {
        return $this->belongsTo(MobileUnit::class);
    }

    public function petugas()
    {
        return $this->belongsTo(User::class, 'petugas_id');
    }
}
