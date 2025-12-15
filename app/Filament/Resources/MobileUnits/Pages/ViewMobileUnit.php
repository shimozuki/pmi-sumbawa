<?php

namespace App\Filament\Resources\MobileUnits\Pages;

use App\Filament\Resources\MobileUnits\MobileUnitResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewMobileUnit extends ViewRecord
{
    protected static string $resource = MobileUnitResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
