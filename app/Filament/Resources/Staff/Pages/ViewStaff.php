<?php

namespace App\Filament\Resources\Staff\Pages;

use App\Filament\Resources\Staff\StaffResource;
use App\Filament\Resources\Staffs\StaffResource as StaffsStaffResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewStaff extends ViewRecord
{
    protected static string $resource = StaffsStaffResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
