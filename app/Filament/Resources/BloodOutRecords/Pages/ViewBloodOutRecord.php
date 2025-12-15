<?php

namespace App\Filament\Resources\BloodOutRecords\Pages;

use App\Filament\Resources\BloodOutRecords\BloodOutRecordResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewBloodOutRecord extends ViewRecord
{
    protected static string $resource = BloodOutRecordResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
