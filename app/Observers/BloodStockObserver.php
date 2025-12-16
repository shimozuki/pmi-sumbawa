<?php

namespace App\Observers;

use App\Models\BloodStock;
use App\Models\User;
use Filament\Notifications\Notification;

class BloodStockObserver
{
    public function saved(BloodStock $bloodStock): void
    {
        if ($bloodStock->jumlah_kantong <= 5) {

            // Ambil admin (sesuaikan role kamu)
            $users = User::role(['admin', 'staff'])->get();

            foreach ($users as $user) {
                Notification::make()
                    ->title('⚠️ Stok Darah Menipis')
                    ->danger()
                    ->body(
                        "Stok darah {$bloodStock->golongan_darah}{$bloodStock->rhesus} tersisa {$bloodStock->jumlah_kantong} kantong."
                    )
                    ->sendToDatabase($user);
            }
        }
    }
}
