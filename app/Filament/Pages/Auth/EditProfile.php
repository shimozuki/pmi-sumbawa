<?php

namespace App\Filament\Pages\Auth;

use Filament\Auth\Pages\EditProfile as BaseEditProfile;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class EditProfile extends BaseEditProfile
{
    public function form(Schema $schema): Schema
    {
        return $schema->schema([
            // Nama
            TextInput::make('name')
                ->label('Nama Lengkap')
                ->required()
                ->maxLength(255),

            // Email
            TextInput::make('email')
                ->label('Email')
                ->email()
                ->required()
                ->unique(
                    table: 'users',
                    column: 'email',
                    ignorable: fn() => auth()->user()
                ),

            // Password baru
            $this->getPasswordFormComponent(),

            // Konfirmasi password
            $this->getPasswordConfirmationFormComponent(),
        ]);
    }
}
