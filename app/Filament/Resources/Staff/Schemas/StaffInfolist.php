<?php

namespace App\Filament\Resources\Staffs\Schemas;

use Filament\Infolists;
use Filament\Schemas\Schema;

class StaffInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([
            Infolists\Components\TextEntry::make('name')
                ->label('Nama'),

            Infolists\Components\TextEntry::make('email'),

            Infolists\Components\TextEntry::make('roles.name')
                ->label('Role')
                ->badge(),
        ]);
    }
}
