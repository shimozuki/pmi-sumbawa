<?php

namespace App\Filament\Resources\BloodOutRecords\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class BloodOutRecordInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('rumah_sakit_id')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('tanggal_keluar')
                    ->date(),
                TextEntry::make('golongan_darah'),
                TextEntry::make('rhesus'),
                TextEntry::make('jumlah_kantong')
                    ->numeric(),
                TextEntry::make('tujuan')
                    ->badge(),
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
