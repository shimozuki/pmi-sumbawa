<?php

namespace App\Filament\Resources\MobileUnits\Schemas;

use Filament\Forms;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class MobileUnitForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([

            Section::make('🚐 Informasi Mobile Unit')
                ->schema([
                    Forms\Components\TextInput::make('kode_unit')
                        ->required()
                        ->unique(ignoreRecord: true)
                        ->placeholder('MU-01'),

                    Forms\Components\TextInput::make('nama_unit')
                        ->required(),

                    Forms\Components\TextInput::make('jenis_kendaraan')
                        ->placeholder('Bus / Van'),

                    Forms\Components\TextInput::make('nomor_polisi'),

                    Forms\Components\TextInput::make('kapasitas')
                        ->numeric()
                        ->minValue(0),

                    Forms\Components\Select::make('status')
                        ->options([
                            'aktif' => 'Aktif',
                            'maintenance' => 'Maintenance',
                            'nonaktif' => 'Nonaktif',
                        ])
                        ->required(),

                    Forms\Components\TextInput::make('lokasi_terakhir'),

                    Forms\Components\Textarea::make('keterangan')
                        ->columnSpanFull(),
                ])
                ->columns(2),
        ]);
    }
}
