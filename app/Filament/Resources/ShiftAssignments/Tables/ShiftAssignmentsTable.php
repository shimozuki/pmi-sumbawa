<?php

namespace App\Filament\Resources\ShiftAssignments\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables;
use Filament\Tables\Table;

class ShiftAssignmentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Petugas')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('shift.nama_shift')
                    ->label('Shift')
                    ->badge(),

                Tables\Columns\TextColumn::make('shift.jam_mulai')
                    ->label('Mulai'),

                Tables\Columns\TextColumn::make('shift.jam_selesai')
                    ->label('Selesai'),

                Tables\Columns\TextColumn::make('tanggal')
                    ->date()
                    ->label('Tanggal'),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
