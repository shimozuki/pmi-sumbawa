<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pendonor extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'nomor_identitas',
        'nama_lengkap',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'kelurahan',
        'kecamatan',
        'kota',
        'telepon_hp',
        'telepon_rumah',
        'telepon_kantor',
        'email',
        'pekerjaan',
        'nomor_kartu_donor',
        'golongan_darah',
        'tanggal_donor_terakhir',
        'jumlah_donor',
        'donor_rutin',
        'siap_donor_kapan_saja',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
        'tanggal_donor_terakhir' => 'date',
        'donor_rutin' => 'boolean',
        'siap_donor_kapan_saja' => 'boolean',
    ];

    // Relasi ke User (jika ada akun)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Helper: umur pendonor
    public function getUmurAttribute(): int
    {
        return $this->tanggal_lahir->age;
    }

    public function screening()
    {
        return $this->hasOne(Screening::class);
    }
}
