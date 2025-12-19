<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Antrian extends Model
{
    protected $fillable = [
        'screening_id',
        'tanggal',
        'nomor',
        'status',
    ];

    public function screening()
    {
        return $this->belongsTo(Screening::class);
    }
}
