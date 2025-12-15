<?php

namespace App\Filament\Resources\Pendonors\Schemas;

use Filament\Forms;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PendonorForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([

            Section::make('🧑 Identitas Pendonor')
                ->schema([
                    Forms\Components\TextInput::make('nomor_identitas')
                        ->label('No KTP / SIM / Paspor')
                        ->required()
                        ->unique(ignoreRecord: true),

                    Forms\Components\TextInput::make('nama_lengkap')
                        ->required(),

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

            Section::make('🏠 Alamat')
                ->schema([
                    Forms\Components\Textarea::make('alamat')->required(),
                    Forms\Components\TextInput::make('kelurahan'),
                    Forms\Components\TextInput::make('kecamatan'),
                    Forms\Components\TextInput::make('kota'),
                ])
                ->columns(2),

            Section::make('📞 Kontak')
                ->schema([
                    Forms\Components\TextInput::make('telepon_hp'),
                    Forms\Components\TextInput::make('telepon_rumah'),
                    Forms\Components\TextInput::make('email')->email(),
                ])
                ->columns(2),

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

                    Forms\Components\Toggle::make('donor_rutin')
                        ->label('Donor Rutin'),

                    Forms\Components\Toggle::make('siap_donor_kapan_saja')
                        ->label('Siap Donor Kapan Saja'),
                ])
                ->columns(2),
        ]);
    }
}
