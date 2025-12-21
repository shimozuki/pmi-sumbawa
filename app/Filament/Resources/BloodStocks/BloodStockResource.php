<?php

namespace App\Filament\Resources\BloodStocks;

use App\Filament\Resources\BloodStocks\Pages\CreateBloodStock;
use App\Filament\Resources\BloodStocks\Pages\EditBloodStock;
use App\Filament\Resources\BloodStocks\Pages\ListBloodStocks;
use App\Models\BloodStock;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class BloodStockResource extends Resource
{
    protected static ?string $model = BloodStock::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBeaker;

    protected static ?string $navigationLabel = 'Stok Darah';

    protected static ?string $pluralModelLabel = 'Stok Darah';

    public static function canCreate(): bool
    {
        return auth()->user()?->hasAnyRole(['admin', 'staff']);
    }

    public static function canEdit($record): bool
    {
        return auth()->user()?->hasAnyRole(['admin', 'staff']);
    }

    public static function canDelete($record): bool
    {
        return auth()->user()?->hasAnyRole(['admin', 'staff']);
    }

    public static function canViewAny(): bool
    {
        return auth()->check()
            && auth()->user()?->can('manage_blood_stock');
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Manajemen';
    }

    public static function form(Schema $schema): Schema
    {
        return \App\Filament\Resources\BloodStocks\Schemas\BloodStockForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return \App\Filament\Resources\BloodStocks\Tables\BloodStocksTable::configure($table);
    }


    public static function getPages(): array
    {
        return [
            'index' => ListBloodStocks::route('/'),
            'create' => CreateBloodStock::route('/create'),
            'edit' => EditBloodStock::route('/{record}/edit'),
        ];
    }
}
