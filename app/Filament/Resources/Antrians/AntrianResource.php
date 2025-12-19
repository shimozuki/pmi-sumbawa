<?php

namespace App\Filament\Resources\Antrians;

use App\Filament\Resources\Antrians\Pages\ListAntrians;
use App\Filament\Resources\Antrians\Pages\ViewAntrian;
use App\Filament\Resources\Antrians\Tables\AntriansTable;
use App\Models\Antrian;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class AntrianResource extends Resource
{
    protected static ?string $model = Antrian::class;

    protected static string|BackedEnum|null $navigationIcon =
    Heroicon::OutlinedQueueList;

    protected static ?string $navigationLabel = 'Antrian Cek Kesehatan';

    public static function getNavigationGroup(): ?string
    {
        return 'Transaksi';
    }

    /**
     * Permission utama
     */
    public static function canViewAny(): bool
    {
        return auth()->user()?->can('manage_antrian');
    }

    /**
     * Antrian TIDAK dibuat manual
     */
    public static function canCreate(): bool
    {
        return false;
    }

    /**
     * Antrian TIDAK diedit manual
     */
    public static function canEdit($record): bool
    {
        return false;
    }

    public static function table(Table $table): Table
    {
        return AntriansTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListAntrians::route('/'),
            'view'  => ViewAntrian::route('/{record}'),
        ];
    }
}
