<?php

namespace App\Filament\Resources\BloodOutRecords\Pages;

use App\Filament\Resources\BloodOutRecords\BloodOutRecordResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListBloodOutRecords extends ListRecords
{
    protected static string $resource = BloodOutRecordResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
