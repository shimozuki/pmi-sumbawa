<?php

namespace App\Filament\Resources\BloodOutRecords\Tables;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Actions\EditAction;

class BloodOutRecordsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tanggal_keluar')
                    ->date(),

                Tables\Columns\TextColumn::make('tujuan')
                    ->badge(),

                Tables\Columns\TextColumn::make('golongan_darah')
                    ->badge(),

                Tables\Columns\TextColumn::make('jumlah_kantong'),
            ])
            ->recordActions([
                EditAction::make(),
            ]);
    }
}
