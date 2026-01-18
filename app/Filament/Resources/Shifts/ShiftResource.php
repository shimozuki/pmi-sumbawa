<?php

namespace App\Filament\Resources\Shifts;

use App\Filament\Resources\Shifts\Pages\CreateShift;
use App\Filament\Resources\Shifts\Pages\EditShift;
use App\Filament\Resources\Shifts\Pages\ListShifts;
use App\Models\Shift;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ShiftResource extends Resource
{
    protected static ?string $model = Shift::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedClock;
    protected static ?string $pluralModelLabel = 'Shift';
    protected static ?string $navigationLabel = 'Shift';

    public static function canViewAny(): bool
    {
        return auth()->check()
            && auth()->user()?->can('manage_shift');
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Manajemen';
    }

    public static function form(Schema $schema): Schema
    {
        return \App\Filament\Resources\Shifts\Schemas\ShiftForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return \App\Filament\Resources\Shifts\Tables\ShiftsTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListShifts::route('/'),
            'create' => CreateShift::route('/create'),
            'edit' => EditShift::route('/{record}/edit'),
        ];
    }
}
