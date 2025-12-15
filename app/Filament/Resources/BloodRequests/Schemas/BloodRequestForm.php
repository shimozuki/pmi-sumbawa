<?php

namespace App\Filament\Resources\BloodRequests\Schemas;

use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class BloodRequestForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([

            /* ===============================
             * INFORMASI PERMINTAAN
             * =============================== */
            Section::make('🏥 Informasi Permintaan')
                ->schema([

                    /* RUMAH SAKIT */
                    Forms\Components\Select::make('hospital_id')
                        ->label('Rumah Sakit')
                        ->relationship('hospital', 'name')
                        ->searchable()
                        ->required()
                        ->visible(fn() => auth()->user()->hasRole('admin'))
                        ->disabled(fn() => auth()->user()->hasRole('rumah_sakit')),

                    Forms\Components\Hidden::make('hospital_id')
                        ->default(fn() => auth()->user()?->hospital?->id)
                        ->dehydrated(true)
                        ->required()
                        ->visible(fn() => auth()->user()->hasRole('rumah_sakit')),

                    /* TANGGAL */
                    Forms\Components\DatePicker::make('tanggal_permintaan')
                        ->label('Tanggal Permintaan')
                        ->required()
                        ->native(false)
                        ->default(now()),

                    /* STATUS */
                    Forms\Components\Select::make('status')
                        ->options([
                            'diajukan' => 'Diajukan',
                            'diproses' => 'Diproses',
                            'disetujui' => 'Disetujui',
                            'ditolak' => 'Ditolak',
                            'selesai' => 'Selesai',
                        ])
                        ->required()
                        ->default('diajukan')
                        ->visible(fn() => auth()->user()->hasRole('admin'))
                        ->disabled(fn() => auth()->user()->hasRole('rumah_sakit')),

                    Forms\Components\Hidden::make('status')
                        ->default('diajukan')
                        ->dehydrated(true)
                        ->visible(fn() => auth()->user()->hasRole('rumah_sakit')),

                    /* CATATAN */
                    Forms\Components\Textarea::make('catatan')
                        ->columnSpanFull(),
                ])
                ->columns(2),

            /* ===============================
             * DETAIL DARAH
             * =============================== */
            Section::make('🩸 Detail Permintaan Darah')
                ->schema([
                    Repeater::make('items')
                        ->relationship()
                        ->schema([
                            Forms\Components\Select::make('golongan_darah')
                                ->label('Gol Darah')
                                ->options([
                                    'A' => 'A',
                                    'B' => 'B',
                                    'AB' => 'AB',
                                    'O' => 'O',
                                ])
                                ->required(),

                            Forms\Components\Select::make('rhesus')
                                ->options([
                                    '+' => '+',
                                    '-' => '-',
                                ])
                                ->required(),

                            Forms\Components\TextInput::make('jumlah_diminta')
                                ->numeric()
                                ->required(),

                            Forms\Components\TextInput::make('jumlah_disetujui')
                                ->numeric()
                                ->default(0)
                                ->visible(fn() => auth()->user()->hasRole('admin')),
                        ])
                        ->columns(4)
                        ->minItems(1),
                ]),
        ]);
    }
}
