<?php

namespace App\Filament\Resources\Screenings\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ScreeningForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('pendonor_id')
                    ->relationship('pendonor', 'id')
                    ->required(),
                TextInput::make('answers')
                    ->required(),
                Select::make('status')
                    ->options(['menunggu' => 'Menunggu', 'diterima' => 'Diterima', 'ditolak' => 'Ditolak'])
                    ->default('menunggu')
                    ->required(),
                TextInput::make('verified_by')
                    ->numeric(),
            ]);
    }
}
