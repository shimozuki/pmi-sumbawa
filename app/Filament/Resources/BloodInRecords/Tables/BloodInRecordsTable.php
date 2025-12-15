<?php

namespace App\Filament\Resources\BloodInRecords\Tables;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Actions\EditAction;

class BloodInRecordsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('pendonor.nama_lengkap')
                    ->label('Pendonor')
                    ->searchable(),

                Tables\Columns\TextColumn::make('tanggal_donor')
                    ->date(),

                Tables\Columns\TextColumn::make('golongan_darah')
                    ->badge(),

                Tables\Columns\TextColumn::make('jumlah_kantong'),

                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn($state) => match ($state) {
                        'valid' => 'success',
                        'pending' => 'warning',
                        'ditolak' => 'danger',
                    }),
            ])
            ->recordActions([
                EditAction::make(),
            ]);
    }
}
