<?php

namespace App\Filament\Resources\BloodInRecords\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class BloodInRecordInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('pendonor_id')
                    ->numeric(),
                TextEntry::make('mobile_unit_id')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('tanggal_donor')
                    ->date(),
                TextEntry::make('golongan_darah'),
                TextEntry::make('rhesus'),
                TextEntry::make('jumlah_kantong')
                    ->numeric(),
                TextEntry::make('status')
                    ->badge(),
                TextEntry::make('petugas_id')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('catatan')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
