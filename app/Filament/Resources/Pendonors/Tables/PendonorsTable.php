<?php

namespace App\Filament\Resources\Pendonors\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables;
use Filament\Tables\Table;

class PendonorsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_lengkap')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('golongan_darah')
                    ->badge(),

                Tables\Columns\TextColumn::make('tanggal_lahir')
                    ->date()
                    ->label('Tgl Lahir'),

                Tables\Columns\TextColumn::make('umur')
                    ->label('Umur')
                    ->getStateUsing(fn($record) => $record->umur . ' th'),

                Tables\Columns\TextColumn::make('telepon_hp')
                    ->label('HP'),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
