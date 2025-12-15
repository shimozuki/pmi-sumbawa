<?php

namespace App\Filament\Resources\Pendonors\Schemas;

use Filament\Infolists;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PendonorInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([

            /* =========================
             * AKUN LOGIN
             * ========================= */
            Section::make('🔐 Akun Login Pendonor')
                ->schema([
                    Infolists\Components\TextEntry::make('user.name')
                        ->label('Nama Akun'),

                    Infolists\Components\TextEntry::make('user.email')
                        ->label('Email Login'),
                ])
                ->columns(2)
                ->visible(fn($record) => $record->user !== null),

            /* =========================
             * IDENTITAS
             * ========================= */
            Section::make('🧑 Identitas Pendonor')
                ->schema([
                    Infolists\Components\TextEntry::make('nomor_identitas'),
                    Infolists\Components\TextEntry::make('nama_lengkap'),
                    Infolists\Components\TextEntry::make('tanggal_lahir')->date(),
                    Infolists\Components\TextEntry::make('jenis_kelamin'),
                ])
                ->columns(2),

            /* =========================
             * KONTAK
             * ========================= */
            Section::make('📞 Kontak')
                ->schema([
                    Infolists\Components\TextEntry::make('telepon_hp'),
                    Infolists\Components\TextEntry::make('email'),
                ])
                ->columns(2),
        ]);
    }
}
