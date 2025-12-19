<?php

namespace App\Filament\Widgets;

use App\Models\BloodRequest;
use Filament\Tables;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;

class PermintaanDarahTable extends TableWidget
{
    protected static ?int $sort = 2;

    public static function canView(): bool
    {
        return auth()->check(); // semua role
    }

    protected function getTableQuery(): Builder
    {
        return BloodRequest::query()
            ->latest();
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('hospital.name')
                ->label('Rumah Sakit')
                ->searchable(),

            Tables\Columns\TextColumn::make('golongan_darah')
                ->label('Gol. Darah')
                ->badge(),

            Tables\Columns\TextColumn::make('jumlah')
                ->label('Jumlah'),

            Tables\Columns\TextColumn::make('status')
                ->badge()
                ->color(fn($state) => match ($state) {
                    'menunggu' => 'warning',
                    'dipenuhi' => 'success',
                    'ditolak'  => 'danger',
                    default    => 'gray',
                }),

            Tables\Columns\TextColumn::make('created_at')
                ->label('Tanggal')
                ->date('d M Y'),
        ];
    }
}
