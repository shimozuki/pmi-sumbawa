<?php

namespace App\Filament\Resources\ScreeningQuestions;

use App\Filament\Resources\ScreeningQuestions\Pages;
use App\Models\ScreeningQuestion;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Filament\Schemas\Schema;

class ScreeningQuestionResource extends Resource
{
    protected static ?string $model = ScreeningQuestion::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedClipboardDocumentCheck;

    protected static ?string $navigationLabel = 'Pertanyaan Screening';

    protected static ?string $pluralModelLabel = 'Pertanyaan Screening';

    public static function canViewAny(): bool
    {
        return auth()->check()
            && auth()->user()?->can('manage_screening_questions');
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Manajemen';
    }

    public static function form(Schema $schema): Schema
    {
        return \App\Filament\Resources\ScreeningQuestions\Schemas\ScreeningQuestionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return \App\Filament\Resources\ScreeningQuestions\Tables\ScreeningQuestionsTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListScreeningQuestions::route('/'),
            'create' => Pages\CreateScreeningQuestion::route('/create'),
            'edit' => Pages\EditScreeningQuestion::route('/{record}/edit'),
        ];
    }
}
