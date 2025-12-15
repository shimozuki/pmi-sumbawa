<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Forms\Form;
use Filament\Forms;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Wizard\Step;
use BackedEnum;

class DonorRegistration extends Page
{
    protected static ?string $navigationLabel = 'Registrasi Donor';

    protected static string|BackedEnum|null $navigationIcon =
    'heroicon-o-clipboard-document-check';

    public ?array $data = [];

    // ✅ HARUS NON-STATIC DI FILAMENT v4
    // protected function getView(): string
    // {
    //     return 'filament.pages.donor-registration';
    // }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Wizard::make([
                    Step::make('Data Diri')
                        ->schema([
                            Forms\Components\TextInput::make('nama_lengkap')
                                ->required(),

                            Forms\Components\DatePicker::make('tanggal_lahir')
                                ->required()
                                ->native(false),

                            Forms\Components\Select::make('jenis_kelamin')
                                ->options([
                                    'Laki-laki' => 'Laki-laki',
                                    'Perempuan' => 'Perempuan',
                                ])
                                ->required(),
                        ]),

                    Step::make('Screening')
                        ->schema([
                            Forms\Components\Radio::make('screening.sehat')
                                ->label('Apakah Anda merasa sehat hari ini?')
                                ->options([
                                    1 => 'Ya',
                                    0 => 'Tidak',
                                ])
                                ->required(),

                            Forms\Components\Radio::make('screening.obat')
                                ->label('Apakah sedang mengonsumsi obat?')
                                ->options([
                                    1 => 'Ya',
                                    0 => 'Tidak',
                                ])
                                ->required(),
                        ]),
                ]),
            ])
            ->statePath('data');
    }
}
