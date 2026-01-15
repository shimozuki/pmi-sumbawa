<?php

namespace App\Filament\Resources\Screenings\Pages;

use App\Filament\Resources\Screenings\ScreeningResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;
use Filament\Actions\Action;

class EditScreening extends EditRecord
{
    protected static string $resource = ScreeningResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }

    protected function getCancelFormAction(): Action
    {
        return Action::make('back')
            ->label('Back')
            ->url($this->getResource()::getUrl('index'))
            ->color('gray');
    }
}
