<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HealthCheck extends Model
{
    use HasFactory;

    protected $fillable = [
        'pendonor_id',
        'staff_id',
        'tekanan_darah',
        'denyut_nadi',
        'berat_badan',
        'tinggi_badan',
        'suhu',
        'hb',
        'keadaan_umum',
        'riwayat_medis',
        'hasil',
    ];

    /**
     * 🔗 Relasi ke Pendonor
     */
    public function pendonor()
    {
        return $this->belongsTo(Pendonor::class);
    }

    /**
     * 🔗 Relasi ke Staff (User)
     */
    public function staff()
    {
        return $this->belongsTo(User::class, 'staff_id');
    }
}
