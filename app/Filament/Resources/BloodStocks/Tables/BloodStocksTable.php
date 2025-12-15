<?php

namespace App\Filament\Resources\BloodStocks\Tables;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;

class BloodStocksTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('golongan_darah')
                    ->badge(),

                Tables\Columns\TextColumn::make('rhesus')
                    ->badge(),

                Tables\Columns\TextColumn::make('jumlah_kantong')
                    ->label('Total'),

                Tables\Columns\TextColumn::make('sisa_stok')
                    ->label('Sisa')
                    ->color(fn($state) => $state <= 5 ? 'danger' : 'success'),
            ])->recordActions([
                EditAction::make()
                    ->visible(fn() => auth()->user()?->hasAnyRole(['admin', 'staff'])),

                DeleteAction::make()
                    ->visible(fn() => auth()->user()?->hasRole('admin')),
            ]);
    }
}
