<?php

namespace App\Observers;

use App\Models\Antrian;
use App\Models\Screening;
use Illuminate\Support\Facades\DB;

class ScreeningObserver
{
    public function updated(Screening $screening): void
    {
        // hanya saat status berubah ke diterima
        if (
            $screening->wasChanged('status')
            && $screening->status === 'diterima'
            && !$screening->antrian
        ) {
            DB::transaction(function () use ($screening) {

                $lastNumber = Antrian::whereDate('tanggal', today())
                    ->lockForUpdate()
                    ->max('nomor');

                Antrian::create([
                    'screening_id' => $screening->id,
                    'tanggal'      => today(),
                    'nomor'        => ($lastNumber ?? 0) + 1,
                    'status'       => 'menunggu',
                ]);
            });
        }
    }
}
