<?php

namespace App\Filament\Resources\BloodOutRecords;

use App\Filament\Resources\BloodOutRecords\Pages\CreateBloodOutRecord;
use App\Filament\Resources\BloodOutRecords\Pages\EditBloodOutRecord;
use App\Filament\Resources\BloodOutRecords\Pages\ListBloodOutRecords;
use App\Models\BloodOutRecord;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class BloodOutRecordResource extends Resource
{
    protected static ?string $model = BloodOutRecord::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedArrowUpCircle;

    protected static ?string $navigationLabel = 'Darah Keluar';

    protected static ?string $pluralModelLabel = 'Darah Keluar';

    protected static ?int $navigationSort = 2;

    public static function canViewAny(): bool
    {
        return auth()->user()?->can('manage_blood_out');
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Transaksi';
    }

    public static function form(Schema $schema): Schema
    {
        return \App\Filament\Resources\BloodOutRecords\Schemas\BloodOutRecordForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return \App\Filament\Resources\BloodOutRecords\Tables\BloodOutRecordsTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListBloodOutRecords::route('/'),
            'create' => CreateBloodOutRecord::route('/create'),
            'edit' => EditBloodOutRecord::route('/{record}/edit'),
        ];
    }
}
