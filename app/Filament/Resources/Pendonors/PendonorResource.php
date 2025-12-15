<?php

namespace App\Filament\Resources\Pendonors;

use App\Filament\Resources\Pendonors\Pages\CreatePendonor;
use App\Filament\Resources\Pendonors\Pages\EditPendonor;
use App\Filament\Resources\Pendonors\Pages\ListPendonors;
use App\Models\Pendonor;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PendonorResource extends Resource
{
    protected static ?string $model = Pendonor::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedHeart;

    protected static ?string $navigationLabel = 'Pendonor';

    protected static ?string $modelLabel = 'Pendonor';

    protected static ?string $pluralModelLabel = 'Pendonor';

    protected static ?string $recordTitleAttribute = 'nama_lengkap';

    protected static ?int $navigationSort = 2;

    public static function canViewAny(): bool
    {
        return auth()->user()?->can('manage_pendonor');
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Manajemen';
    }

    public static function form(Schema $schema): Schema
    {
        return \App\Filament\Resources\Pendonors\Schemas\PendonorForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return \App\Filament\Resources\Pendonors\Tables\PendonorsTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPendonors::route('/'),
            'create' => CreatePendonor::route('/create'),
            'edit' => EditPendonor::route('/{record}/edit'),
        ];
    }
}
