<?php

namespace App\Filament\Resources\JadwalDonors\Pages;

use App\Filament\Resources\JadwalDonors\JadwalDonorResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListJadwalDonors extends ListRecords
{
    protected static string $resource = JadwalDonorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
