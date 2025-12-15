<?php

namespace App\Filament\Pages;

use App\Models\Pendonor;
use App\Models\Screening;
use App\Models\ScreeningQuestion;
use BackedEnum;
use Filament\Pages\Page;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Wizard;
use Filament\Schemas\Components\Wizard\Step;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Toggle;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\DB;

class DonorRegistration extends Page
{
    protected static ?string $navigationLabel = 'Registrasi Donor';

    public static function canViewAny(): bool
    {
        return auth()->user()?->can('register_as_donor');
    }

    protected static string|BackedEnum|null $navigationIcon =
    'heroicon-o-clipboard-document-check';

    protected string $view = 'filament.pages.donor-registration';

    public ?array $data = [];

    /**
     * Autofill data pendonor
     */
    public function mount(): void
    {
        $pendonor = Pendonor::where('user_id', auth()->id())->first();

        if ($pendonor) {
            $this->data = [
                // Identitas
                'nik'               => $pendonor->nomor_identitas,
                'nama_lengkap'      => $pendonor->nama_lengkap,
                'tanggal_lahir'     => $pendonor->tanggal_lahir,
                'jenis_kelamin'     => $pendonor->jenis_kelamin,

                // Alamat
                'alamat'            => $pendonor->alamat,
                'kelurahan'         => $pendonor->kelurahan,
                'kecamatan'         => $pendonor->kecamatan,
                'kota'              => $pendonor->kota,

                // Kontak
                'telepon_hp'        => $pendonor->telepon_hp,
                'telepon_rumah'     => $pendonor->telepon_rumah,
                'email'             => $pendonor->email,

                // Data donor
                'golongan_darah'    => $pendonor->golongan_darah,
                'pekerjaan'         => $pendonor->pekerjaan,
                'nomor_kartu_donor' => $pendonor->nomor_kartu_donor,
                'tanggal_donor_terakhir' => $pendonor->tanggal_donor_terakhir,
                'donor_rutin'       => $pendonor->donor_rutin,
                'siap_kapan_saja'   => $pendonor->siap_kapan_saja,
            ];
        }
    }

    /**
     * Schema + Wizard
     */
    public function schema(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Wizard::make([
                    /**
                     * STEP 1 — DATA DIRI
                     */
                    Step::make('Data Diri')
                        ->schema([
                            Section::make('Identitas Pendonor')
                                ->schema([
                                    TextInput::make('nik')
                                        ->label('No KTP / SIM / Paspor')
                                        ->disabled()
                                        ->dehydrated(false),

                                    TextInput::make('nama_lengkap')
                                        ->required()
                                        ->disabled()
                                        ->dehydrated(false),

                                    DatePicker::make('tanggal_lahir')
                                        ->required()
                                        ->native(false)
                                        ->disabled()
                                        ->dehydrated(false),

                                    Select::make('jenis_kelamin')
                                        ->options([
                                            'Laki-laki' => 'Laki-laki',
                                            'Perempuan' => 'Perempuan',
                                        ])
                                        ->required()
                                        ->disabled()
                                        ->dehydrated(false),
                                ])
                                ->columns(2),

                            Section::make('Alamat')
                                ->schema([
                                    Textarea::make('alamat')->rows(3)->required(),
                                    TextInput::make('kelurahan'),
                                    TextInput::make('kecamatan'),
                                    TextInput::make('kota'),
                                ])
                                ->columns(2),

                            Section::make('Kontak')
                                ->schema([
                                    TextInput::make('telepon_hp'),
                                    TextInput::make('telepon_rumah'),
                                    TextInput::make('email')->email(),
                                ])
                                ->columns(2),

                            Section::make('Data Donor')
                                ->schema([
                                    Select::make('golongan_darah')->options([
                                        'A' => 'A',
                                        'B' => 'B',
                                        'AB' => 'AB',
                                        'O' => 'O',
                                    ]),
                                    TextInput::make('pekerjaan'),
                                    TextInput::make('nomor_kartu_donor')
                                        ->disabled()
                                        ->dehydrated(false),
                                    DatePicker::make('tanggal_donor_terakhir')
                                        ->native(false)
                                        ->disabled()
                                        ->dehydrated(false),
                                    Toggle::make('donor_rutin'),
                                    Toggle::make('siap_kapan_saja'),
                                ])
                                ->columns(2),
                        ]),

                    /**
                     * STEP 2 — SCREENING (DINAMIS)
                     */
                    Step::make('Screening')
                        ->schema(
                            fn() =>
                            ScreeningQuestion::where('is_active', true)
                                ->orderBy('order')
                                ->get()
                                ->map(
                                    fn($q) =>
                                    Radio::make('screening.' . $q->code)
                                        ->label($q->question)
                                        ->options([
                                            1 => 'Ya',
                                            0 => 'Tidak',
                                        ])
                                        ->required()
                                )
                                ->toArray()
                        ),
                ])
                    ->submitAction(
                        Action::make('submit')
                            ->label('Submit')
                            ->color('danger')
                            ->action('submit')
                    ),
            ])
            ->statePath('data');
    }

    /**
     * SUBMIT → SIMPAN KE TABEL screenings
     */
    public function submit(): void
    {
        $pendonor = Pendonor::where('user_id', auth()->id())->first();

        if (! $pendonor) {
            Notification::make()
                ->title('Pendonor tidak ditemukan')
                ->danger()
                ->send();
            return;
        }

        DB::transaction(function () use ($pendonor) {
            Screening::create([
                'pendonor_id' => $pendonor->id,
                'answers'     => $this->data['screening'],
                'status'      => 'menunggu',
                'verified_by' => null,
            ]);
        });

        Notification::make()
            ->title('Screening berhasil dikirim')
            ->success()
            ->send();

        $this->redirect('/admin/blood-requests');
    }
}
