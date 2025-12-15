<?php

namespace App\Filament\Resources\Hospitals\Pages;

use App\Filament\Resources\Hospitals\HospitalResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditHospital extends EditRecord
{
    protected static string $resource = HospitalResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        if (isset($data['password'])) {
            $this->record->user->update([
                'password' => $data['password'],
            ]);
        }

        unset($data['password'], $data['user']);

        return $data;
    }
}
