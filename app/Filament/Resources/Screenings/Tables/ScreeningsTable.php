<?php

namespace App\Filament\Resources\Screenings\Tables;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Actions\ViewAction;
use Filament\Actions\Action;

class ScreeningsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('pendonor.nama_lengkap')
                    ->label('Pendonor')
                    ->searchable(),

                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn($state) => match ($state) {
                        'menunggu' => 'warning',
                        'diterima' => 'success',
                        'ditolak'  => 'danger',
                    }),

                Tables\Columns\TextColumn::make('verified_by')
                    ->label('Diverifikasi Oleh')
                    ->formatStateUsing(fn($state) => $state ? 'Staff' : '-'),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal')
                    ->dateTime('d M Y H:i'),
            ])
            ->recordActions([
                ViewAction::make(),

                Action::make('approve')
                    ->label('Terima')
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->visible(
                        fn($record) =>
                        auth()->user()?->can('manage_screening')
                            && $record->status === 'menunggu'
                    )
                    ->action(
                        fn($record) =>
                        $record->update([
                            'status' => 'diterima',
                            'verified_by' => auth()->id(),
                        ])
                    ),

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
                    ->action(
                        fn($record) =>
                        $record->update([
                            'status' => 'ditolak',
                            'verified_by' => auth()->id(),
                        ])
                    ),
            ]);
    }
}
