<?php

namespace App\Filament\Resources\BloodRequests\Pages;

use App\Filament\Resources\BloodRequests\BloodRequestResource;
use Filament\Resources\Pages\CreateRecord;

class CreateBloodRequest extends CreateRecord
{
    protected static string $resource = BloodRequestResource::class;
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if (auth()->user()->hasRole('rumah_sakit')) {
            $data['hospital_id'] = auth()->user()->hospital->id;
            $data['status'] = 'diajukan';
        }

        return $data;
    }
}
