<?php

namespace App\Filament\Resources\JadwalDonors;

use App\Filament\Resources\JadwalDonors\Pages\CreateJadwalDonor;
use App\Filament\Resources\JadwalDonors\Pages\EditJadwalDonor;
use App\Filament\Resources\JadwalDonors\Pages\ListJadwalDonors;
use App\Filament\Resources\JadwalDonors\Pages\ViewJadwalDonor;
use App\Filament\Resources\JadwalDonors\Schemas\JadwalDonorForm;
use App\Filament\Resources\JadwalDonors\Schemas\JadwalDonorInfolist;
use App\Filament\Resources\JadwalDonors\Tables\JadwalDonorsTable;
use App\Models\JadwalDonor;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class JadwalDonorResource extends Resource
{
    protected static ?string $model = JadwalDonor::class;

    protected static string|BackedEnum|null $navigationIcon =
    Heroicon::OutlinedCalendarDays;

    protected static ?string $navigationLabel = 'Jadwal Donor';

    protected static ?string $recordTitleAttribute = 'nama_event';

    /**
     * Group navigasi
     */
    public static function getNavigationGroup(): ?string
    {
        return 'Transaksi';
    }

    public static function canCreate(): bool
    {
        return ! auth()->user()?->hasRole('pendonor');
    }

    /**
     * Semua role boleh lihat tabel
     */
    public static function canViewAny(): bool
    {
        return auth()->check()
            && auth()->user()?->can('manage_jadwal');
    }

    /**
     * Hanya admin & staff boleh edit
     */
    public static function canEdit($record): bool
    {
        return auth()->user()?->can('manage_jadwal');
    }

    /**
     * Hanya admin & staff boleh delete (opsional)
     */
    public static function canDelete($record): bool
    {
        return auth()->user()?->can('manage_jadwal');
    }

    public static function form(Schema $schema): Schema
    {
        return JadwalDonorForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return JadwalDonorInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return JadwalDonorsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => ListJadwalDonors::route('/'),
            'create' => CreateJadwalDonor::route('/create'),
            'view'   => ViewJadwalDonor::route('/{record}'),
            'edit'   => EditJadwalDonor::route('/{record}/edit'),
        ];
    }
}
