<?php

namespace App\Filament\Resources\Hospitals\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class HospitalsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                // ======================
                // DATA RUMAH SAKIT
                // ======================
                TextColumn::make('name')
                    ->label('Nama Rumah Sakit')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('code')
                    ->label('Kode RS')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('city')
                    ->label('Kota')
                    ->searchable(),

                TextColumn::make('phone')
                    ->label('Telepon')
                    ->searchable(),

                // ======================
                // AKUN ADMIN RS
                // ======================
                TextColumn::make('user.name')
                    ->label('Admin RS')
                    ->searchable(),

                TextColumn::make('user.email')
                    ->label('Email Login')
                    ->searchable(),

                // ======================
                // TIMESTAMP
                // ======================
                TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->label('Diubah')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
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
