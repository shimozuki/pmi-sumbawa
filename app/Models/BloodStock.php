<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BloodStock extends Model
{
    protected $fillable = [
        'golongan_darah',
        'rhesus',
        'jumlah_kantong',
        'jumlah_terpakai',
        'jumlah_rusak',
        'tanggal_update',
    ];

    protected $casts = [
        'tanggal_update' => 'date',
    ];

    public function getSisaStokAttribute(): int
    {
        return $this->jumlah_kantong - $this->jumlah_terpakai - $this->jumlah_rusak;
    }
}
