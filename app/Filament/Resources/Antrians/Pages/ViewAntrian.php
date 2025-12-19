<?php

namespace App\Filament\Resources\Antrians\Pages;

use App\Filament\Resources\Antrians\AntrianResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewAntrian extends ViewRecord
{
    protected static string $resource = AntrianResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
