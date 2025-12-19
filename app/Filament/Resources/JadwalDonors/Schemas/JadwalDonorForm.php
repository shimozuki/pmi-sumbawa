<?php

namespace App\Filament\Resources\JadwalDonors\Schemas;

use Filament\Forms;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class JadwalDonorForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([

            /* =======================
             * INFORMASI EVENT / KEGIATAN
             * ======================= */
            Section::make('Informasi Kegiatan Donor')
                ->schema([

                    Forms\Components\TextInput::make('nama_event')
                        ->label('Nama Event / Kegiatan')
                        ->required(),

                    Forms\Components\Textarea::make('deskripsi')
                        ->label('Deskripsi')
                        ->rows(3)
                        ->columnSpanFull(),

                    Forms\Components\TextInput::make('lokasi')
                        ->label('Lokasi Donor')
                        ->required(),

                ])
                ->columns(2),

            /* =======================
             * WAKTU & KAPASITAS
             * ======================= */
            Section::make('Waktu & Kapasitas')
                ->schema([

                    Forms\Components\DatePicker::make('tanggal')
                        ->label('Tanggal Donor')
                        ->required(),

                    Forms\Components\TimePicker::make('jam_mulai')
                        ->label('Jam Mulai')
                        ->required(),

                    Forms\Components\TimePicker::make('jam_selesai')
                        ->label('Jam Selesai')
                        ->required()
                        ->after('jam_mulai'),

                    Forms\Components\TextInput::make('kuota')
                        ->label('Kuota Pendonor')
                        ->numeric()
                        ->minValue(1)
                        ->helperText('Kosongkan jika tidak dibatasi'),

                ])
                ->columns(2),

            /* =======================
             * STATUS JADWAL
             * ======================= */
            Section::make('Status')
                ->schema([

                    Forms\Components\Select::make('status')
                        ->label('Status Jadwal')
                        ->options([
                            'aktif' => 'Aktif',
                            'tutup' => 'Tutup',
                        ])
                        ->default('aktif')
                        ->required(),

                ])
                ->columns(1),

        ]);
    }
}
