<?php

namespace App\Filament\Resources\HealthChecks\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class HealthCheckInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('pendonor_id')
                    ->numeric(),
                TextEntry::make('staff_id')
                    ->numeric(),
                TextEntry::make('tekanan_darah'),
                TextEntry::make('denyut_nadi')
                    ->numeric(),
                TextEntry::make('berat_badan')
                    ->numeric(),
                TextEntry::make('tinggi_badan')
                    ->numeric(),
                TextEntry::make('suhu')
                    ->numeric(),
                TextEntry::make('hb')
                    ->placeholder('-'),
                TextEntry::make('keadaan_umum')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('riwayat_medis')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('hasil')
                    ->badge(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
