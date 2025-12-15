<?php

namespace App\Filament\Resources\Pendonors\Schemas;

use App\Models\Pendonor;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class PendonorInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('user_id')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('nomor_identitas'),
                TextEntry::make('nama_lengkap'),
                TextEntry::make('tanggal_lahir')
                    ->date(),
                TextEntry::make('jenis_kelamin')
                    ->badge(),
                TextEntry::make('alamat')
                    ->columnSpanFull(),
                TextEntry::make('kelurahan')
                    ->placeholder('-'),
                TextEntry::make('kecamatan')
                    ->placeholder('-'),
                TextEntry::make('kota')
                    ->placeholder('-'),
                TextEntry::make('telepon_hp')
                    ->placeholder('-'),
                TextEntry::make('telepon_rumah')
                    ->placeholder('-'),
                TextEntry::make('telepon_kantor')
                    ->placeholder('-'),
                TextEntry::make('email')
                    ->label('Email address')
                    ->placeholder('-'),
                TextEntry::make('pekerjaan')
                    ->placeholder('-'),
                TextEntry::make('nomor_kartu_donor')
                    ->placeholder('-'),
                TextEntry::make('golongan_darah')
                    ->placeholder('-'),
                TextEntry::make('tanggal_donor_terakhir')
                    ->date()
                    ->placeholder('-'),
                TextEntry::make('jumlah_donor')
                    ->numeric(),
                IconEntry::make('donor_rutin')
                    ->boolean(),
                IconEntry::make('siap_donor_kapan_saja')
                    ->boolean(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('deleted_at')
                    ->dateTime()
                    ->visible(fn (Pendonor $record): bool => $record->trashed()),
            ]);
    }
}
