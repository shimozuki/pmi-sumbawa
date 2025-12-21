<?php

namespace App\Filament\Resources\ShiftAssignments;

use App\Filament\Resources\ShiftAssignments\Pages\CreateShiftAssignment;
use App\Filament\Resources\ShiftAssignments\Pages\EditShiftAssignment;
use App\Filament\Resources\ShiftAssignments\Pages\ListShiftAssignments;
use App\Filament\Resources\ShiftAssignments\Schemas\ShiftAssignmentForm;
use App\Filament\Resources\ShiftAssignments\Tables\ShiftAssignmentsTable;
use App\Models\ShiftAssignment;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ShiftAssignmentResource extends Resource
{
    protected static ?string $model = ShiftAssignment::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCalendarDays;

    public static function canViewAny(): bool
    {
        return auth()->check()
            && auth()->user()?->can('manage_shift');
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Transaksi';
    }

    public static function form(Schema $schema): Schema
    {
        return ShiftAssignmentForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ShiftAssignmentsTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListShiftAssignments::route('/'),
            'create' => CreateShiftAssignment::route('/create'),
            'edit' => EditShiftAssignment::route('/{record}/edit'),
        ];
    }
}
