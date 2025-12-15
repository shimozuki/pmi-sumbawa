<?php

namespace App\Filament\Resources\BloodStocks\Pages;

use App\Filament\Resources\BloodStocks\BloodStockResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewBloodStock extends ViewRecord
{
    protected static string $resource = BloodStockResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
