<?php

namespace App\Filament\Resources\Roles\Schemas;

use Filament\Forms;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class RoleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([

            Section::make('🛡️ Informasi Role')
                ->description('Nama role dan hak akses yang dimiliki')
                ->schema([

                    Forms\Components\TextInput::make('name')
                        ->label('Nama Role')
                        ->required()
                        ->unique(ignoreRecord: true)
                        ->placeholder('contoh: admin, staff, pendonor')
                        ->columnSpanFull(),

                ])
                ->columns(1)
                ->collapsible()
                ->collapsed(false),

            Section::make('🔐 Hak Akses (Permission)')
                ->description('Pilih permission yang dimiliki role ini')
                ->schema([

                    Forms\Components\CheckboxList::make('permissions')
                        ->relationship('permissions', 'name')
                        ->searchable()
                        ->columns(3)
                        ->helperText('Centang permission yang diizinkan untuk role ini')
                        ->columnSpanFull(),

                ])
                ->collapsible()
                ->collapsed(false),

        ]);
    }
}
