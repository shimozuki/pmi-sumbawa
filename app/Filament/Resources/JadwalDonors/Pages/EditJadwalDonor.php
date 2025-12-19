<?php

namespace App\Filament\Resources\JadwalDonors\Pages;

use App\Filament\Resources\JadwalDonors\JadwalDonorResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditJadwalDonor extends EditRecord
{
    protected static string $resource = JadwalDonorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
