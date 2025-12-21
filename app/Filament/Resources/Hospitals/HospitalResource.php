<?php

namespace App\Filament\Resources\Hospitals;

use App\Filament\Resources\Hospitals\Pages;
use App\Models\Hospital;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class HospitalResource extends Resource
{
    protected static ?string $model = Hospital::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBuildingOffice2;

    protected static ?string $navigationLabel = 'Rumah Sakit';

    protected static ?string $pluralModelLabel = 'Rumah Sakit';

    public static function canViewAny(): bool
    {
        return auth()->check()
            && auth()->user()?->can('manage_hospital');
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Kelola Akun';
    }

    public static function form(Schema $schema): Schema
    {
        return \App\Filament\Resources\Hospitals\Schemas\HospitalForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return \App\Filament\Resources\Hospitals\Tables\HospitalsTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListHospitals::route('/'),
            'create' => Pages\CreateHospital::route('/create'),
            'edit' => Pages\EditHospital::route('/{record}/edit'),
        ];
    }
}
