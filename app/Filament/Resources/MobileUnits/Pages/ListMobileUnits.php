<?php

namespace App\Filament\Resources\MobileUnits\Pages;

use App\Filament\Resources\MobileUnits\MobileUnitResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMobileUnits extends ListRecords
{
    protected static string $resource = MobileUnitResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
