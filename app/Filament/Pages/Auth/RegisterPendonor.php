<?php

namespace App\Filament\Pages\Auth;

use App\Models\User;
use App\Models\Pendonor;
use Filament\Auth\Pages\Register;
use Filament\Schemas\Schema;
use Filament\Forms\Components\{
    TextInput,
    DatePicker,
    Select,
    Textarea,
    Toggle
};
use Filament\Schemas\Components\{
    Section,
    Grid,
    Wizard
};
use Filament\Schemas\Components\Wizard\Step;
use Filament\Support\Icons\Heroicon;
use Filament\Support\Enums\Width;
use Illuminate\Support\Facades\{DB, Hash, Blade};
use Illuminate\Support\HtmlString;

class RegisterPendonor extends Register
{
    protected Width|string|null $maxWidth = '4xl';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Wizard::make([
                    // ================= STEP 1: AKUN LOGIN =================
                    Step::make('Akun Login')
                        ->icon(Heroicon::UserCircle)
                        ->description('Buat akun untuk login')
                        ->schema([
                            Grid::make(2)->schema([
                                TextInput::make('name')
                                    ->label('Nama Akun')
                                    ->required()
                                    ->maxLength(255)
                                    ->columnSpan(2),

                                TextInput::make('email')
                                    ->label('Email')
                                    ->email()
                                    ->required()
                                    ->unique(User::class)
                                    ->maxLength(255),

                                TextInput::make('password')
                                    ->label('Password')
                                    ->password()
                                    ->required()
                                    ->minLength(8)
                                    ->dehydrateStateUsing(fn($state) => Hash::make($state)),

                                TextInput::make('password_confirmation')
                                    ->label('Konfirmasi Password')
                                    ->password()
                                    ->required()
                                    ->same('password')
                                    ->dehydrated(false),
                            ]),
                        ]),

                    // ================= STEP 2: DATA PENDONOR =================
                    Step::make('Data Pendonor')
                        ->icon(Heroicon::Identification)
                        ->description('Informasi pribadi pendonor')
                        ->schema([
                            Section::make('Identitas')
                                ->schema([
                                    Grid::make(2)->schema([
                                        TextInput::make('nomor_identitas')
                                            ->label('Nomor Identitas (KTP/NIK)')
                                            ->required()
                                            ->unique('pendonors')
                                            ->maxLength(255),

                                        TextInput::make('nama_lengkap')
                                            ->label('Nama Lengkap')
                                            ->required()
                                            ->maxLength(255),

                                        DatePicker::make('tanggal_lahir')
                                            ->label('Tanggal Lahir')
                                            ->required()
                                            ->native(false)
                                            ->maxDate(now()),

                                        Select::make('jenis_kelamin')
                                            ->label('Jenis Kelamin')
                                            ->options([
                                                'Laki-laki' => 'Laki-laki',
                                                'Perempuan' => 'Perempuan',
                                            ])
                                            ->required(),
                                    ]),
                                ]),

                            Section::make('Alamat & Kontak')
                                ->schema([
                                    Grid::make(2)->schema([
                                        Textarea::make('alamat')
                                            ->label('Alamat Lengkap')
                                            ->required()
                                            ->rows(3)
                                            ->columnSpan(2),

                                        TextInput::make('kelurahan')
                                            ->label('Kelurahan')
                                            ->maxLength(255),

                                        TextInput::make('kecamatan')
                                            ->label('Kecamatan')
                                            ->maxLength(255),

                                        TextInput::make('kota')
                                            ->label('Kota/Kabupaten')
                                            ->maxLength(255),

                                        TextInput::make('telepon_hp')
                                            ->label('Telepon HP')
                                            ->tel()
                                            ->maxLength(255),

                                        TextInput::make('telepon_rumah')
                                            ->label('Telepon Rumah')
                                            ->tel()
                                            ->maxLength(255),

                                        TextInput::make('telepon_kantor')
                                            ->label('Telepon Kantor')
                                            ->tel()
                                            ->maxLength(255),
                                    ]),
                                ]),

                            Section::make('Informasi Donor')
                                ->schema([
                                    Grid::make(2)->schema([
                                        TextInput::make('pekerjaan')
                                            ->label('Pekerjaan')
                                            ->maxLength(255),

                                        TextInput::make('nomor_kartu_donor')
                                            ->label('Nomor Kartu Donor')
                                            ->maxLength(255),

                                        Select::make('golongan_darah')
                                            ->label('Golongan Darah')
                                            ->options([
                                                'A' => 'A',
                                                'B' => 'B',
                                                'AB' => 'AB',
                                                'O' => 'O',
                                            ])
                                            ->placeholder('Pilih Golongan Darah'),

                                        DatePicker::make('tanggal_donor_terakhir')
                                            ->label('Tanggal Donor Terakhir')
                                            ->native(false)
                                            ->maxDate(now()),

                                        Toggle::make('donor_rutin')
                                            ->label('Donor Rutin')
                                            ->default(false)
                                            ->inline(false),

                                        Toggle::make('siap_donor_kapan_saja')
                                            ->label('Siap Donor Kapan Saja')
                                            ->default(false)
                                            ->inline(false),
                                    ]),
                                ]),
                        ]),
                ])
                    ->columnSpanFull()
                    ->submitAction(new HtmlString(Blade::render(<<<BLADE
                    <x-filament::button
                        type="submit"
                        size="lg"
                        color="primary"
                    >
                        Daftar Sekarang
                    </x-filament::button>
                BLADE)))
            ]);
    }

    protected function handleRegistration(array $data): User
    {
        return DB::transaction(function () use ($data) {
            // Create User
            $user = User::create([
                'name'     => $data['name'],
                'email'    => $data['email'],
                'password' => $data['password'],
            ]);

            $user->assignRole('pendonor');

            Pendonor::create([
                'user_id' => $user->id,
                'nomor_identitas' => $data['nomor_identitas'],
                'nama_lengkap' => $data['nama_lengkap'],
                'tanggal_lahir' => $data['tanggal_lahir'],
                'jenis_kelamin' => $data['jenis_kelamin'],
                'alamat' => $data['alamat'],
                'kelurahan' => $data['kelurahan'] ?? null,
                'kecamatan' => $data['kecamatan'] ?? null,
                'kota' => $data['kota'] ?? null,
                'telepon_hp' => $data['telepon_hp'] ?? null,
                'telepon_rumah' => $data['telepon_rumah'] ?? null,
                'telepon_kantor' => $data['telepon_kantor'] ?? null,
                'email' => $data['email'],
                'pekerjaan' => $data['pekerjaan'] ?? null,
                'nomor_kartu_donor' => $data['nomor_kartu_donor'] ?? null,
                'golongan_darah' => $data['golongan_darah'] ?? null,
                'tanggal_donor_terakhir' => $data['tanggal_donor_terakhir'] ?? null,
                'donor_rutin' => $data['donor_rutin'] ?? false,
                'siap_donor_kapan_saja' => $data['siap_donor_kapan_saja'] ?? false,
            ]);

            return $user;
        });
    }

    protected function getRedirectUrl(): string
    {
        return route('filament.admin.pages.dashboard');
    }
}
