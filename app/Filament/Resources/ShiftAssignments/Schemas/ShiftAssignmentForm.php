<?php

namespace App\Filament\Resources\ShiftAssignments\Schemas;

use Filament\Forms;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ShiftAssignmentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([

            Section::make('📅 Jadwal Petugas')
                ->schema([

                    Forms\Components\Select::make('user_id')
                        ->label('Petugas')
                        ->relationship('user', 'name')
                        ->searchable()
                        ->required(),

                    Forms\Components\Select::make('shift_id')
                        ->label('Shift')
                        ->relationship('shift', 'nama_shift')
                        ->required(),

                    Forms\Components\DatePicker::make('tanggal')
                        ->label('Tanggal Bertugas')
                        ->required()
                        ->native(false),

                ])
                ->columns(2),
        ]);
    }
}
