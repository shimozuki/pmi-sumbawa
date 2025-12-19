<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Screening extends Model
{
    protected $fillable = [
        'pendonor_id',
        'answers',
        'status',
        'verified_by',
        'catatan_petugas',
    ];

    protected $casts = [
        'answers' => 'array',
    ];

    /* =========================
     * RELATIONS
     * ========================= */

    public function pendonor(): BelongsTo
    {
        return $this->belongsTo(Pendonor::class);
    }

    public function verifier(): BelongsTo
    {
        return $this->belongsTo(User::class, 'verified_by');
    }

    public function antrian()
    {
        return $this->hasOne(Antrian::class);
    }
}
