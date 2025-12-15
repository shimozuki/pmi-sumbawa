<?php

namespace App\Filament\Resources\Shifts\Schemas;

use Filament\Forms;
use Filament\Schemas\Schema;

class ShiftForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([
            Forms\Components\TextInput::make('nama_shift')
                ->required(),

            Forms\Components\TimePicker::make('jam_mulai')
                ->required(),

            Forms\Components\TimePicker::make('jam_selesai')
                ->required(),

            Forms\Components\Textarea::make('keterangan'),
        ]);
    }
}
