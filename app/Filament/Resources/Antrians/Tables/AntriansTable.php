<?php

namespace App\Filament\Resources\Antrians\Tables;

use App\Filament\Resources\HealthChecks\HealthCheckResource;
use Filament\Actions\Action;
use Filament\Actions\ViewAction;
use Filament\Tables;
use Filament\Tables\Table;

class AntriansTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('nomor')
                    ->label('No Antrian')
                    ->formatStateUsing(
                        fn($state) =>
                        'A-' . str_pad($state, 3, '0', STR_PAD_LEFT)
                    )
                    ->sortable(),

                Tables\Columns\TextColumn::make('screening.pendonor.nama_lengkap')
                    ->label('Pendonor')
                    ->searchable(),

                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn(string $state) => match ($state) {
                        'menunggu'       => 'warning',
                        'dipanggil'      => 'info',
                        'cek_kesehatan'  => 'primary',
                        'selesai'        => 'success',
                        default          => 'gray',
                    }),

                Tables\Columns\TextColumn::make('tanggal')
                    ->date('d M Y')
                    ->sortable(),
            ])

            ->defaultSort('nomor')

            ->recordActions([

                // ViewAction::make(),

                Action::make('panggil')
                    ->label('Lanjut')
                    ->icon('heroicon-o-speaker-wave')
                    ->color('info')
                    ->visible(
                        fn($record) =>
                        auth()->user()?->can('manage_antrian')
                            && $record->status === 'menunggu'
                    )
                    ->requiresConfirmation()
                    ->action(fn($record) => $record->update([
                        'status' => 'dipanggil',
                    ])),

                Action::make('cek')
                    ->label('Cek Kesehatan')
                    ->icon('heroicon-o-heart')
                    ->color('primary')
                    ->visible(
                        fn($record) =>
                        auth()->user()?->can('admin')
                            && $record->status === 'dipanggil'
                    )
                    ->action(fn($record) => $record->update([
                        'status' => 'cek_kesehatan',
                    ])),

                Action::make('selesai')
                    ->label('Selesai')
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->visible(fn($record) => $record->status === 'cek_kesehatan')
                    ->requiresConfirmation()
                    ->action(fn($record) => $record->update([
                        'status' => 'selesai',
                    ])),
            ])
            ->toolbarActions([]);
    }
}
