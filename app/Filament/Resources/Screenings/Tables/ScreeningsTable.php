<?php

namespace App\Filament\Resources\Screenings\Tables;

use App\Filament\Resources\HealthChecks\HealthCheckResource;
use Filament\Actions\Action;
use Filament\Actions\ViewAction;
use Filament\Tables;
use Filament\Tables\Table;

class ScreeningsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('pendonor.nama_lengkap')
                    ->label('Pendonor')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn(string $state) => match ($state) {
                        'menunggu' => 'warning',
                        'diterima' => 'success',
                        'ditolak'  => 'danger',
                        default    => 'gray',
                    }),

                Tables\Columns\TextColumn::make('verifier.name')
                    ->label('Diverifikasi Oleh')
                    ->placeholder('-'),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
            ])

            ->recordActions([

                // 👁️ Semua role boleh lihat
                ViewAction::make(),

                // ✅ TERIMA
                Action::make('approve')
                    ->label('Terima')
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->requiresConfirmation()
                    ->visible(
                        fn($record) =>
                        auth()->user()?->can('manage_screening')
                            && $record->status === 'menunggu'
                    )
                    ->action(fn($record) => $record->update([
                        'status' => 'diterima',
                        'verified_by' => auth()->id(),
                    ])),

                // ❌ TOLAK
                Action::make('reject')
                    ->label('Tolak')
                    ->icon('heroicon-o-x-circle')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->visible(
                        fn($record) =>
                        auth()->user()?->can('manage_screening')
                            && $record->status === 'menunggu'
                    )
                    ->action(fn($record) => $record->update([
                        'status' => 'ditolak',
                        'verified_by' => auth()->id(),
                    ])),

                // 🩺 CEK KESEHATAN
                Action::make('health_check')
                    ->label('Cek Kesehatan')
                    ->icon('heroicon-o-heart')
                    ->color('primary')
                    ->visible(
                        fn($record) =>
                        auth()->user()?->can('manage_screening')
                            && $record->status === 'diterima'
                            && !$record->healthCheck
                    )
                    ->url(
                        fn($record) =>
                        HealthCheckResource::getUrl('create', [
                            'pendonor_id' => $record->pendonor_id,
                        ])
                    )


            ]);
    }
}
