<?php

namespace App\Filament\Resources\Permissions\Schemas;

use Filament\Forms;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PermissionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([

            Section::make('🔑 Informasi Permission')
                ->description('Nama hak akses yang digunakan oleh sistem')
                ->schema([

                    Forms\Components\TextInput::make('name')
                        ->label('Nama Permission')
                        ->required()
                        ->unique(ignoreRecord: true)
                        ->placeholder('contoh: manage_users, manage_pendonor')
                        ->helperText('Gunakan snake_case')
                        ->columnSpanFull(),

                ])
                ->columns(1)
                ->collapsible()
                ->collapsed(false),

        ]);
    }
}
