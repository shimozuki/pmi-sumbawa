<?php

namespace App\Filament\Resources\Pendonors\Pages;

use App\Filament\Resources\Pendonors\PendonorResource;
use Filament\Resources\Pages\EditRecord;
use Filament\Actions\Action;

class EditPendonor extends EditRecord
{
    protected static string $resource = PendonorResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        unset($data['user']);
        return $data;
    }

    protected function getCancelFormAction(): Action
    {
        return Action::make('back')
            ->label('Back')
            ->url($this->getResource()::getUrl('index'))
            ->color('gray');
    }
}
