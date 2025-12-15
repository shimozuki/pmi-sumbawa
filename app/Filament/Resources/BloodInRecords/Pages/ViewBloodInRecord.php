<?php

namespace App\Filament\Resources\BloodInRecords\Pages;

use App\Filament\Resources\BloodInRecords\BloodInRecordResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewBloodInRecord extends ViewRecord
{
    protected static string $resource = BloodInRecordResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
