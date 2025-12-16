<?php

namespace App\Filament\Resources\Staffs\Schemas;

use Filament\Forms;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Hash;

class StaffForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([

            Section::make('Data Staf')
                ->schema([

                    Forms\Components\TextInput::make('name')
                        ->required(),

                    Forms\Components\TextInput::make('email')
                        ->email()
                        ->unique(ignoreRecord: true)
                        ->required(),

                    Forms\Components\TextInput::make('password')
                        ->password()
                        ->required(fn($context) => $context === 'create')
                        ->dehydrateStateUsing(
                            fn($state) =>
                            filled($state) ? Hash::make($state) : null
                        )
                        ->dehydrated(fn($state) => filled($state)),

                ])
                ->columns(2),
        ]);
    }
}
