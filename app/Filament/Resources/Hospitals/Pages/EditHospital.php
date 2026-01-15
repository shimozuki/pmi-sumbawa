<?php

namespace App\Filament\Resources\Hospitals\Pages;

use App\Filament\Resources\Hospitals\HospitalResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;
use Filament\Actions\Action;

class EditHospital extends EditRecord
{
    protected static string $resource = HospitalResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        if (isset($data['user'])) {
            $this->record->user->update([
                'name'  => $data['user']['name'],
                'email' => $data['user']['email'],
            ]);
        }

        if (! empty($data['password'])) {
            $this->record->user->update([
                'password' => $data['password'],
            ]);
        }

        unset($data['user'], $data['password']);

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
