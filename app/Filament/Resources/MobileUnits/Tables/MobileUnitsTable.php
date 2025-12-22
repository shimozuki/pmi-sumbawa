<?php

namespace App\Filament\Resources\MobileUnits\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables;
use Filament\Tables\Table;

class MobileUnitsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('kode_unit')
                    ->label('Kode')
                    ->searchable(),

                Tables\Columns\TextColumn::make('nama_unit')
                    ->label('Nama')
                    ->searchable(),

                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn(string $state) => match ($state) {
                        'aktif' => 'success',
                        'maintenance' => 'warning',
                        'nonaktif' => 'danger',
                    }),

                Tables\Columns\TextColumn::make('kapasitas')
                    ->label('Kapasitas'),
            ])
            ->recordActions([
                EditAction::make()->visible(fn() => auth()->user()?->hasAnyRole(['admin', 'staff'])),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()->visible(fn() => auth()->user()?->hasAnyRole(['admin', 'staff'])),
                ]),
            ]);
    }
}
