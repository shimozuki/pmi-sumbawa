<?php

namespace App\Filament\Resources\BloodRequests\Tables;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Actions\EditAction;

class BloodRequestsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('hospital.name')
                    ->label('Rumah Sakit')
                    ->searchable(),

                Tables\Columns\TextColumn::make('tanggal_permintaan')
                    ->date(),

                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn($state) => match ($state) {
                        'diajukan' => 'warning',
                        'diproses' => 'info',
                        'disetujui' => 'success',
                        'ditolak' => 'danger',
                        'selesai' => 'secondary',
                    }),
            ])
            ->recordActions([
                EditAction::make(),
            ]);
    }
}
