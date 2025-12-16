<?php

namespace App\Filament\Resources\HealthChecks\Pages;

use App\Filament\Resources\HealthChecks\HealthCheckResource;
use App\Models\Pendonor;
use Filament\Resources\Pages\CreateRecord;

class CreateHealthCheck extends CreateRecord
{
    protected static string $resource = HealthCheckResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // 🔒 VALIDASI KERAS
        abort_if(
            empty($data['pendonor_id']) ||
                ! Pendonor::whereKey($data['pendonor_id'])->exists(),
            403,
            'Pendonor tidak valid'
        );

        return $data;
    }
}
