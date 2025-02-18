<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GithubRepositoryResource\Pages;
use App\Models\GithubRepository;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;

class GithubRepositoryResource extends Resource
{
    protected static ?string $model = GithubRepository::class;
    protected static ?string $navigationIcon = 'bi-github';
    protected static ?string $navigationGroup = 'Suivi GitHub';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            TextInput::make('owner')->label('Propriétaire du Dépôt')->required(),
            TextInput::make('name')->label('Nom du Dépôt')->required(),
        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table->columns([
            TextColumn::make('owner')->label('Propriétaire'),
            TextColumn::make('name')->label('Dépôt'),
            TextColumn::make('created_at')->label('Ajouté le')->date(),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGithubRepositories::route('/'),
            'create' => Pages\CreateGithubRepository::route('/create'),
            'edit' => Pages\EditGithubRepository::route('/{record}/edit'),
        ];
    }
}
