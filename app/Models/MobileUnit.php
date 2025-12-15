<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MobileUnit extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'kode_unit',
        'nama_unit',
        'jenis_kendaraan',
        'nomor_polisi',
        'kapasitas',
        'status',
        'lokasi_terakhir',
        'keterangan',
    ];
}
