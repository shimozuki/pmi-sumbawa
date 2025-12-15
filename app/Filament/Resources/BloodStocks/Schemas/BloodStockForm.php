<?php

namespace App\Filament\Resources\BloodStocks\Schemas;

use Filament\Forms;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class BloodStockForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([
            Section::make('🩸 Data Stok Darah')
                ->schema([
                    Forms\Components\Select::make('golongan_darah')
                        ->options([
                            'A' => 'A',
                            'B' => 'B',
                            'AB' => 'AB',
                            'O' => 'O',
                        ])
                        ->required(),

                    Forms\Components\Select::make('rhesus')
                        ->options([
                            '+' => '+',
                            '-' => '-',
                        ])
                        ->required(),

                    Forms\Components\TextInput::make('jumlah_kantong')
                        ->numeric()
                        ->required(),

                    Forms\Components\TextInput::make('jumlah_terpakai')
                        ->numeric()
                        ->default(0),

                    Forms\Components\TextInput::make('jumlah_rusak')
                        ->numeric()
                        ->default(0),
                ])
                ->columns(2),
        ]);
    }
}
