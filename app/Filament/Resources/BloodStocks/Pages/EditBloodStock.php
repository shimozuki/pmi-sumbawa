<?php

namespace App\Filament\Resources\BloodStocks\Pages;

use App\Filament\Resources\BloodStocks\BloodStockResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditBloodStock extends EditRecord
{
    protected static string $resource = BloodStockResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
