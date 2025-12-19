<?php

namespace App\Filament\Widgets;

use App\Models\BloodStock;
use Filament\Tables;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;

class StokDarahTable extends TableWidget
{
    protected static ?int $sort = 3;

    public static function canView(): bool
    {
        return auth()->check(); // semua role
    }

    protected function getTableQuery(): Builder
    {
        return BloodStock::query();
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('golongan_darah')
                ->label('Gol. Darah')
                ->badge(),

            Tables\Columns\TextColumn::make('jumlah')
                ->label('Stok')
                ->color(
                    fn($state) =>
                    $state < 10 ? 'danger' : 'success'
                ),

            Tables\Columns\TextColumn::make('updated_at')
                ->label('Update Terakhir')
                ->since(),
        ];
    }
}
