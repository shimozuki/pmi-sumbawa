<?php

namespace App\Filament\Resources\ScreeningQuestions\Schemas;

use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;

class ScreeningQuestionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([
            Section::make('🩺 Informasi Pertanyaan')
                ->schema([
                    Forms\Components\TextInput::make('question')
                        ->label('Pertanyaan')
                        ->required()
                        ->columnSpanFull(),

                    Forms\Components\TextInput::make('code')
                        ->label('Kode')
                        ->helperText('Contoh: q1, q2, q3')
                        ->required()
                        ->unique(ignoreRecord: true),

                    Forms\Components\TextInput::make('order')
                        ->label('Urutan')
                        ->numeric()
                        ->default(0),

                    Forms\Components\Toggle::make('is_active')
                        ->label('Aktif')
                        ->default(true),
                ])
                ->columns(2),
        ]);
    }
}
