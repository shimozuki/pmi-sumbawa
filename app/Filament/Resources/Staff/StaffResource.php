<?php

namespace App\Filament\Resources\Staffs;

use App\Filament\Resources\Staffs\Pages\ListStaffs;
use App\Filament\Resources\Staffs\Pages\CreateStaff;
use App\Filament\Resources\Staffs\Pages\EditStaff;
use App\Filament\Resources\Staffs\Schemas\StaffForm;
use App\Filament\Resources\Staffs\Schemas\StaffInfolist;
use App\Filament\Resources\Staffs\Tables\StaffsTable;
use App\Models\User;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class StaffResource extends Resource
{
    protected static ?string $model = User::class;

    protected static string|BackedEnum|null $navigationIcon =
    Heroicon::OutlinedUsers;

    protected static ?string $navigationLabel = 'Manajemen Staf';

    protected static bool $shouldRegisterNavigation = true;


    public static function getNavigationGroup(): ?string
    {
        return 'Kelola Akun';
    }


    // 🔒 hanya admin
        public static function canViewAny(): bool
    {
        return auth()->check()
            && auth()->user()?->can('manage_staff');
    }

    public static function form(Schema $schema): Schema
    {
        return StaffForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return StaffInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return StaffsTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index'  => ListStaffs::route('/'),
            'create' => CreateStaff::route('/create'),
            'edit'   => EditStaff::route('/{record}/edit'),
        ];
    }
}
