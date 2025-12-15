<?php

namespace App\Filament\Resources\Hospitals\Pages;

use App\Filament\Resources\Hospitals\HospitalResource;
use App\Models\User;
use Filament\Resources\Pages\CreateRecord;
use Spatie\Permission\Models\Role;

class CreateHospital extends CreateRecord
{
    protected static string $resource = HospitalResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $userData = $data['user'];
        unset($data['user']);

        $user = User::create([
            'name' => $userData['name'],
            'email' => $userData['email'],
            'password' => $data['password'],
        ]);

        $user->assignRole('rumah_sakit');

        $data['user_id'] = $user->id;
        unset($data['password']);

        return $data;
    }
}
