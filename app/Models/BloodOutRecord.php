<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BloodOutRecord extends Model
{
    protected $fillable = [
        'rumah_sakit_id',
        'tanggal_keluar',
        'golongan_darah',
        'rhesus',
        'jumlah_kantong',
        'tujuan',
        'status',
        'petugas_id',
        'catatan',
    ];

    protected $casts = [
        'tanggal_keluar' => 'date',
    ];

    // 🔗 RELATIONS
    // public function rumahSakit()
    // {
    //     return $this->belongsTo(RumahSakit::class);
    // }

    public function petugas()
    {
        return $this->belongsTo(User::class, 'petugas_id');
    }
}
