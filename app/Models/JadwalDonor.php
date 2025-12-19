<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalDonor extends Model
{
    protected $fillable = [
        'nama_event',
        'deskripsi',
        'lokasi',
        'tanggal',
        'jam_mulai',
        'jam_selesai',
        'kuota',
        'status',
    ];

    protected function getTableQuery()
    {
        return JadwalDonor::query();
    }
}
