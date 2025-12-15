<?php

namespace App\Filament\Resources\BloodRequests;

use App\Filament\Resources\BloodRequests\Pages\CreateBloodRequest;
use App\Filament\Resources\BloodRequests\Pages\EditBloodRequest;
use App\Filament\Resources\BloodRequests\Pages\ListBloodRequests;
use App\Models\BloodRequest;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class BloodRequestResource extends Resource
{
    protected static ?string $model = BloodRequest::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedClipboardDocument;

    protected static ?string $navigationLabel = 'Permintaan Darah RS';

    protected static ?string $pluralModelLabel = 'Permintaan Darah';

    public static function canViewAny(): bool
    {
        return auth()->user()?->can('manage_blood_request');
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Transaksi';
    }

    public static function form(Schema $schema): Schema
    {
        return \App\Filament\Resources\BloodRequests\Schemas\BloodRequestForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return \App\Filament\Resources\BloodRequests\Tables\BloodRequestsTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListBloodRequests::route('/'),
            'create' => CreateBloodRequest::route('/create'),
            'edit' => EditBloodRequest::route('/{record}/edit'),
        ];
    }
}
