<?php

namespace App\Filament\Resources\Antrians\Pages;

use App\Filament\Resources\Antrians\AntrianResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAntrians extends ListRecords
{
    protected static string $resource = AntrianResource::class;

    protected function getHeaderActions(): array
    {
        return [
            
        ];
    }
}
