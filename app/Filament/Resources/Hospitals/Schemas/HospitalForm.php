<?php

namespace App\Filament\Resources\Hospitals\Schemas;

use App\Models\User;
use Filament\Forms;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class HospitalForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([

            /* =======================
             * AKUN RUMAH SAKIT
             * ======================= */
            Section::make('Akun Rumah Sakit')
                ->schema([
                    Forms\Components\TextInput::make('user.name')
                        ->label('Nama Admin RS')
                        ->required(),

                    Forms\Components\TextInput::make('user.email')
                        ->email()
                        ->required()
                        ->unique(
                            table: User::class,
                            column: 'email',
                            ignoreRecord: true
                        ),

                    Forms\Components\TextInput::make('password')
                        ->label('Password')
                        ->password()
                        ->revealable()
                        ->required(fn($livewire) => $livewire instanceof \Filament\Resources\Pages\CreateRecord)
                        ->dehydrated(fn($state) => filled($state))
                        ->dehydrateStateUsing(fn($state) => Hash::make($state)),
                ])
                ->columns(2),

            /* =======================
             * DATA RUMAH SAKIT
             * ======================= */
            Section::make('Data Rumah Sakit')
                ->schema([
                    Forms\Components\TextInput::make('name')
                        ->label('Nama Rumah Sakit')
                        ->required(),

                    Forms\Components\TextInput::make('code')
                        ->label('Kode RS')
                        ->unique(ignoreRecord: true),

                    Forms\Components\TextInput::make('email')
                        ->label('Email RS'),

                    Forms\Components\TextInput::make('phone')
                        ->label('Telepon'),

                    Forms\Components\Textarea::make('address')
                        ->label('Alamat')
                        ->columnSpanFull(),

                    Forms\Components\TextInput::make('city')
                        ->label('Kota'),
                ])
                ->columns(2),
        ]);
    }
}
