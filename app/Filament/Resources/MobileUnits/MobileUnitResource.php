<?php

namespace App\Filament\Resources\MobileUnits;

use App\Filament\Resources\MobileUnits\Pages\CreateMobileUnit;
use App\Filament\Resources\MobileUnits\Pages\EditMobileUnit;
use App\Filament\Resources\MobileUnits\Pages\ListMobileUnits;
use App\Models\MobileUnit;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MobileUnitResource extends Resource
{
    protected static ?string $model = MobileUnit::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedTruck;

    protected static ?string $navigationLabel = 'Mobile Unit';

    protected static ?string $modelLabel = 'Mobile Unit';

    protected static ?string $pluralModelLabel = 'Mobile Unit';

    protected static ?int $navigationSort = 3;

    public static function canViewAny(): bool
    {
        return auth()->check()
            && auth()->user()?->can('manage_mobile_unit');
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Manajemen';
    }

    public static function form(Schema $schema): Schema
    {
        return \App\Filament\Resources\MobileUnits\Schemas\MobileUnitForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return \App\Filament\Resources\MobileUnits\Tables\MobileUnitsTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListMobileUnits::route('/'),
            'create' => CreateMobileUnit::route('/create'),
            'edit' => EditMobileUnit::route('/{record}/edit'),
        ];
    }
}
