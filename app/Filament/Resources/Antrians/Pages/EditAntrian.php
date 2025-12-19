<?php

namespace App\Filament\Resources\Antrians\Pages;

use App\Filament\Resources\Antrians\AntrianResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditAntrian extends EditRecord
{
    protected static string $resource = AntrianResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
