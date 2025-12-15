<?php

namespace App\Filament\Resources\Pendonors\Pages;

use App\Filament\Resources\Pendonors\PendonorResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPendonors extends ListRecords
{
    protected static string $resource = PendonorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
