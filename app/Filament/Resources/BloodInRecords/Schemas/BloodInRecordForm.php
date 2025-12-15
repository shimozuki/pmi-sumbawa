<?php

namespace App\Filament\Resources\BloodInRecords\Schemas;

use App\Models\Pendonor;
use App\Models\MobileUnit;
use Filament\Forms;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class BloodInRecordForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([
            Section::make('🩸 Darah Masuk')
                ->schema([
                    Forms\Components\Select::make('pendonor_id')
                        ->relationship('pendonor', 'nama_lengkap')
                        ->searchable()
                        ->required(),

                    Forms\Components\Select::make('mobile_unit_id')
                        ->relationship('mobileUnit', 'nama_unit')
                        ->searchable()
                        ->nullable(),

                    Forms\Components\DatePicker::make('tanggal_donor')
                        ->required()
                        ->native(false),

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

                    Forms\Components\Select::make('status')
                        ->options([
                            'pending' => 'Pending',
                            'valid' => 'Valid',
                            'ditolak' => 'Ditolak',
                        ])
                        ->required(),

                    Forms\Components\Textarea::make('catatan')
                        ->columnSpanFull(),
                ])
                ->columns(2),
        ]);
    }
}
