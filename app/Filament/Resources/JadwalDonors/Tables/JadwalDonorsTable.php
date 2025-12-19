<?php

namespace App\Filament\Resources\JadwalDonors\Tables;

use Filament\Actions\Action;
use Filament\Actions\ViewAction;
use Filament\Tables;
use Filament\Tables\Table;

class JadwalDonorsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('nama_event')
                    ->label('Event')
                    ->searchable(),

                Tables\Columns\TextColumn::make('lokasi')
                    ->searchable(),

                Tables\Columns\TextColumn::make('tanggal')
                    ->date('d M Y')
                    ->sortable(),

                Tables\Columns\TextColumn::make('jam_mulai')
                    ->label('Jam')
                    ->formatStateUsing(
                        fn($record) =>
                        $record->jam_mulai . ' - ' . $record->jam_selesai
                    ),

                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn($state) => match ($state) {
                        'aktif' => 'success',
                        'tutup' => 'danger',
                        default => 'gray',
                    }),
            ])

            ->recordActions([
                ViewAction::make(),
                Action::make('donor_sekarang')
                    ->label('Donor Sekarang')
                    ->icon('heroicon-o-heart')
                    ->color('danger')
                    ->url(fn() => url('/admin/donor-registration'))
                    ->visible(
                        fn($record) =>
                        auth()->user()?->hasRole('pendonor')
                            && $record->status === 'aktif'
                    ),
            ]);
    }
}
