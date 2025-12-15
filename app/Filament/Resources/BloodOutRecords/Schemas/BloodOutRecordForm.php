<?php

namespace App\Filament\Resources\BloodOutRecords\Schemas;

use Filament\Forms;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class BloodOutRecordForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([
            Section::make('🩸 Darah Keluar')
                ->schema([
                    Forms\Components\DatePicker::make('tanggal_keluar')
                        ->required()
                        ->native(false),

                    Forms\Components\Select::make('tujuan')
                        ->options([
                            'rumah_sakit' => 'Rumah Sakit',
                            'pasien' => 'Pasien',
                            'pemusnahan' => 'Pemusnahan',
                        ])
                        ->required(),

                    Forms\Components\Select::make('golongan_darah')
                        ->options([
                            'A' => 'A',
                            'B' => 'B',
                            'AB' => 'AB',
                            'O' => 'O'
                        ])
                        ->required(),

                    Forms\Components\Select::make('rhesus')
                        ->options(['+' => '+', '-' => '-'])
                        ->required(),

                    Forms\Components\TextInput::make('jumlah_kantong')
                        ->numeric()
                        ->required(),

                    Forms\Components\Textarea::make('catatan')
                        ->columnSpanFull(),
                ])
                ->columns(2),
        ]);
    }
}
