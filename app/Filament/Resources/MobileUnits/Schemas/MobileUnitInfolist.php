<?php

namespace App\Filament\Resources\MobileUnits\Schemas;

use App\Models\MobileUnit;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class MobileUnitInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('kode_unit'),
                TextEntry::make('nama_unit'),
                TextEntry::make('jenis_kendaraan')
                    ->placeholder('-'),
                TextEntry::make('nomor_polisi')
                    ->placeholder('-'),
                TextEntry::make('kapasitas')
                    ->numeric(),
                TextEntry::make('status')
                    ->badge(),
                TextEntry::make('lokasi_terakhir')
                    ->placeholder('-'),
                TextEntry::make('keterangan')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('deleted_at')
                    ->dateTime()
                    ->visible(fn (MobileUnit $record): bool => $record->trashed()),
            ]);
    }
}
