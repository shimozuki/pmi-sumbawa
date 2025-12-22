<?php

namespace App\Filament\Resources\HealthChecks;

use App\Filament\Resources\HealthChecks\Pages\CreateHealthCheck;
use App\Filament\Resources\HealthChecks\Pages\EditHealthCheck;
use App\Filament\Resources\HealthChecks\Pages\ListHealthChecks;
use App\Filament\Resources\HealthChecks\Pages\ViewHealthCheck;
use App\Filament\Resources\HealthChecks\Schemas\HealthCheckForm;
use App\Filament\Resources\HealthChecks\Schemas\HealthCheckInfolist;
use App\Filament\Resources\HealthChecks\Tables\HealthChecksTable;
use App\Models\HealthCheck;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class HealthCheckResource extends Resource
{
    protected static ?string $model = HealthCheck::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedHeart;

    protected static ?string $navigationLabel = 'Cek Kesehatan';

    public static function getNavigationGroup(): ?string
    {
        return 'Transaksi';
    }

    public static function canViewAny(): bool
    {
        return auth()->check()
            && auth()->user()?->can('manage_health_check');
    }

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

    public static function canDeleteAny(): bool
    {
        return auth()->user()?->hasAnyRole(['admin', 'staff']);
    }

    /* =======================
     |  FORM
     ======================= */
    public static function form(Schema $schema): Schema
    {
        return HealthCheckForm::configure($schema);
    }

    /* =======================
     |  INFOLIST
     ======================= */
    public static function infolist(Schema $schema): Schema
    {
        return HealthCheckInfolist::configure($schema);
    }

    /* =======================
     |  TABLE
     ======================= */
    public static function table(Table $table): Table
    {
        return HealthChecksTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index'  => ListHealthChecks::route('/'),
            'create' => CreateHealthCheck::route('/create'),
            'view'   => ViewHealthCheck::route('/{record}'),
            'edit'   => EditHealthCheck::route('/{record}/edit'),
        ];
    }
}
