<?php

namespace App\Filament\Resources\BloodStocks\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class BloodStockInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('golongan_darah'),
                TextEntry::make('rhesus'),
                TextEntry::make('jumlah_kantong')
                    ->numeric(),
                TextEntry::make('jumlah_terpakai')
                    ->numeric(),
                TextEntry::make('jumlah_rusak')
                    ->numeric(),
                TextEntry::make('tanggal_update')
                    ->date()
                    ->placeholder('-'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
