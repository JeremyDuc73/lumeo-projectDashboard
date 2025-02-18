<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReleaseResource\Pages;
use App\Models\Release;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;

class ReleaseResource extends Resource
{
    protected static ?string $model = Release::class;
    protected static ?string $navigationIcon = 'heroicon-o-rocket-launch';
    protected static ?string $navigationGroup = 'Gestion du Projet';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            TextInput::make('title')->label('Titre de la Release')->required(),
            Textarea::make('description')->label('Description')->required(),
            TextInput::make('url')->label('Lien vers la Production')->url(),
        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table->columns([
            TextColumn::make('title')->label('Version')->sortable(),
            TextColumn::make('description')->label('Détails')->limit(50),
            TextColumn::make('url')
                ->label('Lien')
                ->formatStateUsing(fn ($state) => $state ? "<a href='$state' target='_blank' class='text-blue-600 underline'>Voir</a>" : 'N/A')
                ->html(),
            TextColumn::make('created_at')->label('Ajouté le')->date(),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListReleases::route('/'),
            'create' => Pages\CreateRelease::route('/create'),
            'edit' => Pages\EditRelease::route('/{record}/edit'),
        ];
    }
}
