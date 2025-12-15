<?php

namespace App\Filament\Resources\BloodInRecords\Pages;

use App\Filament\Resources\BloodInRecords\BloodInRecordResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditBloodInRecord extends EditRecord
{
    protected static string $resource = BloodInRecordResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
