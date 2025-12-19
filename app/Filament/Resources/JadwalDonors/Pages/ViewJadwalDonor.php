<?php

namespace App\Filament\Resources\JadwalDonors\Pages;

use App\Filament\Resources\JadwalDonors\JadwalDonorResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewJadwalDonor extends ViewRecord
{
    protected static string $resource = JadwalDonorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make()
                ->visible(fn() => auth()->user()?->hasAnyRole(['admin', 'staff'])),
        ];
    }
}
