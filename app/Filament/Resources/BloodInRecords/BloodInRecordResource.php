<?php

namespace App\Filament\Resources\BloodInRecords;

use App\Filament\Resources\BloodInRecords\Pages\CreateBloodInRecord;
use App\Filament\Resources\BloodInRecords\Pages\EditBloodInRecord;
use App\Filament\Resources\BloodInRecords\Pages\ListBloodInRecords;
use App\Models\BloodInRecord;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class BloodInRecordResource extends Resource
{
    protected static ?string $model = BloodInRecord::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedArrowDownCircle;

    protected static ?string $navigationLabel = 'Darah Masuk';

    protected static ?string $pluralModelLabel = 'Darah Masuk';

    protected static ?int $navigationSort = 1;

    public static function canViewAny(): bool
    {
        return auth()->check()
            && auth()->user()?->can('manage_blood_in');
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Transaksi';
    }

    public static function form(Schema $schema): Schema
    {
        return \App\Filament\Resources\BloodInRecords\Schemas\BloodInRecordForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return \App\Filament\Resources\BloodInRecords\Tables\BloodInRecordsTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListBloodInRecords::route('/'),
            'create' => CreateBloodInRecord::route('/create'),
            'edit' => EditBloodInRecord::route('/{record}/edit'),
        ];
    }
}
