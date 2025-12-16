<?php

namespace App\Filament\Resources\Staffs\Tables;

use Filament\Actions\EditAction;
use Filament\Tables;
use Filament\Tables\Table;

class StaffsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(
                fn($query) =>
                $query->role('staff')
            )
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama')
                    ->searchable(),

                Tables\Columns\TextColumn::make('email')
                    ->searchable(),

                Tables\Columns\TextColumn::make('roles.name')
                    ->label('Role')
                    ->badge(),

                Tables\Columns\TextColumn::make('created_at')
                    ->date('d M Y'),
            ])
            ->recordActions([
                EditAction::make(),
            ]);
    }
}
