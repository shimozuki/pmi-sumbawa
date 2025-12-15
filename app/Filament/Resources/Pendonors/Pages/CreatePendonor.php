<?php

namespace App\Filament\Resources\Pendonors\Pages;

use App\Filament\Resources\Pendonors\PendonorResource;
use App\Models\User;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Hash;

class CreatePendonor extends CreateRecord
{
    protected static string $resource = PendonorResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if (auth()->user()->hasAnyRole(['admin', 'staff']) && isset($data['user'])) {
            $user = User::create([
                'name' => $data['user']['name'],
                'email' => $data['user']['email'],
                'password' => Hash::make($data['user']['password']),
            ]);

            $user->assignRole('pendonor');
            $data['user_id'] = $user->id;

            unset($data['user']);
        }

        if (auth()->user()->hasRole('pendonor')) {
            $data['user_id'] = auth()->id();
        }

        return $data;
    }
}
