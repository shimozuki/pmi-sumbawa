<?php

namespace App\Filament\Widgets;

use App\Models\JadwalDonor;
use Filament\Tables;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;

class JadwalDonorTable extends TableWidget
{
    protected static ?int $sort = 3;

    public static function canView(): bool
    {
        return auth()->user()?->hasRole('pendonor');
    }

    protected function getTableQuery(): Builder
    {
        return JadwalDonor::query()
            ->where('status', 'aktif');
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('nama_event')
                ->label('Event'),

            Tables\Columns\TextColumn::make('lokasi'),

            Tables\Columns\TextColumn::make('tanggal')
                ->date(),

            Tables\Columns\TextColumn::make('status')
                ->badge(),
        ];
    }
}
