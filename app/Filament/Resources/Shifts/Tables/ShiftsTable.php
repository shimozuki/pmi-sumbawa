<?php

namespace App\Filament\Resources\Shifts\Tables;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Actions\EditAction;

class ShiftsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_shift')
                    ->searchable(),

                Tables\Columns\TextColumn::make('jam_mulai'),

                Tables\Columns\TextColumn::make('jam_selesai'),
            ])
            ->recordActions([
                EditAction::make(),
            ]);
    }
}
