<?php

namespace App\Filament\Resources\BloodInRecords\Pages;

use App\Filament\Resources\BloodInRecords\BloodInRecordResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListBloodInRecords extends ListRecords
{
    protected static string $resource = BloodInRecordResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
