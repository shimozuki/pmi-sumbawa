<?php

namespace App\Filament\Resources\BloodRequests\Tables;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\Action;

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
                // ✅ Custom action ala Filament 4
                Action::make('donor_sekarang')
                    ->label('Donor Sekarang')
                    ->icon('heroicon-o-heart')
                    ->color('danger')
                    ->url(fn() => url('/admin/donor-registration'))
                    ->visible(
                        fn($record) =>
                        auth()->user()?->hasRole('pendonor')
                            && $record->status === 'disetujui'
                    ),

                // ✅ Edit hanya non-pendonor
                EditAction::make()
                    ->visible(fn() => ! auth()->user()?->hasRole('pendonor')),
            ]);
    }
}
