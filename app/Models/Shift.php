<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    protected $fillable = [
        'nama_shift',
        'jam_mulai',
        'jam_selesai',
        'keterangan',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class)
            ->withPivot('tanggal')
            ->withTimestamps();
    }
}
