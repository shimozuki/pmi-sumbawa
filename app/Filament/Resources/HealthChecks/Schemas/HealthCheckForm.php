<?php

namespace App\Filament\Resources\HealthChecks\Schemas;

use Filament\Forms;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Hidden;

class HealthCheckForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([

            Hidden::make('pendonor_id')
                ->default(fn() => request()->query('pendonor_id'))
                ->required(),

            Hidden::make('staff_id')
                ->default(fn() => auth()->id())
                ->required(),

            Section::make('🩺 Pemeriksaan Fisik')
                ->schema([

                    Forms\Components\TextInput::make('tekanan_darah')
                        ->label('Tekanan Darah')
                        ->placeholder('120/80')
                        ->required(),

                    Forms\Components\TextInput::make('denyut_nadi')
                        ->label('Denyut Nadi (bpm)')
                        ->numeric()
                        ->required(),

                    Forms\Components\TextInput::make('suhu')
                        ->label('Suhu Tubuh (°C)')
                        ->numeric()
                        ->required(),

                ])
                ->columns(3),

            Section::make('⚖️ Antropometri')
                ->schema([

                    Forms\Components\TextInput::make('berat_badan')
                        ->label('Berat Badan (kg)')
                        ->numeric()
                        ->required(),

                    Forms\Components\TextInput::make('tinggi_badan')
                        ->label('Tinggi Badan (cm)')
                        ->numeric()
                        ->required(),

                ])
                ->columns(2),

            Section::make('🧪 Pemeriksaan Tambahan')
                ->schema([

                    Forms\Components\TextInput::make('hb')
                        ->label('HB')
                        ->placeholder('g/dL'),

                    Forms\Components\Textarea::make('keadaan_umum')
                        ->label('Keadaan Umum')
                        ->rows(3),

                    Forms\Components\Textarea::make('riwayat_medis')
                        ->label('Riwayat Medis')
                        ->rows(3),

                ])
                ->columns(2),

            Section::make('📋 Hasil Pemeriksaan')
                ->schema([

                    Forms\Components\Select::make('hasil')
                        ->label('Hasil')
                        ->options([
                            'lolos' => 'Lolos Donor',
                            'tidak_lolos' => 'Tidak Lolos',
                        ])
                        ->required(),

                ]),
        ]);
    }
}
