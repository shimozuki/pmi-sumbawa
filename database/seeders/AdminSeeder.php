<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        $adminRole = Role::firstOrCreate(['name' => 'admin']);

        $admin = User::firstOrCreate(
            ['email' => 'admin@pmi.test'],
            [
                'name' => 'Administrator PMI',
                'password' => Hash::make('password'),
            ]
        );
        $admin->assignRole($adminRole);

        $permissions = Permission::all();
        $admin->syncPermissions($permissions);
    }
}
