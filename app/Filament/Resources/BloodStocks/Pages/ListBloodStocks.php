<?php

namespace App\Filament\Resources\BloodStocks\Pages;

use App\Filament\Resources\BloodStocks\BloodStockResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListBloodStocks extends ListRecords
{
    protected static string $resource = BloodStockResource::class;

    protected function getHeaderActions(): array
    {
        return auth()->user()?->hasAnyRole(['admin', 'staff'])
            ? [
                \Filament\Actions\CreateAction::make(),
            ]
            : [];
    }
}
