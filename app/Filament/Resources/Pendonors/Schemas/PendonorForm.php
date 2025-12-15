<?php

namespace App\Filament\Resources\Pendonors\Schemas;

use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;

class PendonorForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([

            /* ===============================
             * AKUN LOGIN (ADMIN / STAFF)
             * =============================== */
            Section::make('🔐 Akun Login Pendonor')
                ->schema([
                    Forms\Components\TextInput::make('user.name')
                        ->label('Nama Akun')
                        ->required(),

                    Forms\Components\TextInput::make('user.email')
                        ->label('Email Login')
                        ->email()
                        ->required(),

                    Forms\Components\TextInput::make('user.password')
                        ->label('Password')
                        ->password()
                        ->required()
                        ->minLength(8),
                ])
                ->visible(fn() => auth()->user()->hasAnyRole(['admin', 'staff']))
                ->columns(2),

            /* ===============================
             * IDENTITAS
             * =============================== */
            Section::make('🧑 Identitas Pendonor')
                ->schema([
                    Forms\Components\TextInput::make('nomor_identitas')
                        ->label('No KTP / SIM / Paspor')
                        ->required()
                        ->unique(ignoreRecord: true),

                    Forms\Components\TextInput::make('nama_lengkap')
                        ->required()
                        ->default(fn() => auth()->user()?->name)
                        ->disabled(fn() => auth()->user()->hasRole('pendonor')),

                    Forms\Components\DatePicker::make('tanggal_lahir')
                        ->required()
                        ->native(false),

                    Forms\Components\Select::make('jenis_kelamin')
                        ->required()
                        ->options([
                            'Laki-laki' => 'Laki-laki',
                            'Perempuan' => 'Perempuan',
                        ]),
                ])
                ->columns(2),

            /* ===============================
             * ALAMAT
             * =============================== */
            Section::make('🏠 Alamat')
                ->schema([
                    Forms\Components\Textarea::make('alamat')->required(),
                    Forms\Components\TextInput::make('kelurahan'),
                    Forms\Components\TextInput::make('kecamatan'),
                    Forms\Components\TextInput::make('kota'),
                ])
                ->columns(2),

            /* ===============================
             * KONTAK
             * =============================== */
            Section::make('📞 Kontak')
                ->schema([
                    Forms\Components\TextInput::make('telepon_hp'),
                    Forms\Components\TextInput::make('telepon_rumah'),
                    Forms\Components\TextInput::make('email')
                        ->email()
                        ->default(fn() => auth()->user()?->email)
                        ->disabled(fn() => auth()->user()->hasRole('pendonor')),
                ])
                ->columns(2),

            /* ===============================
             * DATA DONOR
             * =============================== */
            Section::make('🩸 Data Donor')
                ->schema([
                    Forms\Components\Select::make('golongan_darah')
                        ->options([
                            'A' => 'A',
                            'B' => 'B',
                            'AB' => 'AB',
                            'O' => 'O',
                            'A+' => 'A+',
                            'A-' => 'A-',
                            'B+' => 'B+',
                            'B-' => 'B-',
                            'AB+' => 'AB+',
                            'AB-' => 'AB-',
                            'O+' => 'O+',
                            'O-' => 'O-',
                        ]),

                    Forms\Components\TextInput::make('pekerjaan'),
                    Forms\Components\TextInput::make('nomor_kartu_donor'),

                    Forms\Components\DatePicker::make('tanggal_donor_terakhir')
                        ->native(false),

                    Forms\Components\Toggle::make('donor_rutin'),
                    Forms\Components\Toggle::make('siap_donor_kapan_saja'),
                ])
                ->columns(2),
        ]);
    }
}
