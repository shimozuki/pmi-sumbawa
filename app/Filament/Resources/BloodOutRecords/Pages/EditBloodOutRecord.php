<?php

namespace App\Filament\Resources\BloodOutRecords\Pages;

use App\Filament\Resources\BloodOutRecords\BloodOutRecordResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditBloodOutRecord extends EditRecord
{
    protected static string $resource = BloodOutRecordResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
