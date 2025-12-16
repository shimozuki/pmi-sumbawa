<?php

namespace App\Filament\Resources\HealthChecks\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class HealthChecksTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('pendonor.nama_lengkap')
                    ->label('Pendonor')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('staff.name')
                    ->label('Petugas')
                    ->sortable(),

                TextColumn::make('tekanan_darah')
                    ->label('TD')
                    ->searchable(),

                TextColumn::make('denyut_nadi')
                    ->label('Nadi')
                    ->suffix(' bpm')
                    ->sortable(),

                TextColumn::make('suhu')
                    ->label('Suhu')
                    ->suffix(' °C')
                    ->sortable(),

                TextColumn::make('hb')
                    ->label('HB')
                    ->toggleable(),

                TextColumn::make('hasil')
                    ->label('Hasil')
                    ->badge()
                    ->color(fn(string $state) => match ($state) {
                        'lolos' => 'success',
                        'tidak_lolos' => 'danger',
                        default => 'gray',
                    }),

                TextColumn::make('created_at')
                    ->label('Tanggal')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
            ])

            ->filters([
                // nanti bisa tambah filter hasil / tanggal
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
