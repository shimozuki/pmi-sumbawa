<?php

namespace App\Filament\Resources\Pendonors\Pages;

use App\Filament\Resources\Pendonors\PendonorResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewPendonor extends ViewRecord
{
    protected static string $resource = PendonorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
