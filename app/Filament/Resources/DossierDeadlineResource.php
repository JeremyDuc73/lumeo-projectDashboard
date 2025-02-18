<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DossierDeadlineResource\Pages;
use App\Models\DossierDeadline;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;

class DossierDeadlineResource extends Resource
{

    protected static ?string $model = DossierDeadline::class;
    protected static ?string $navigationIcon = 'heroicon-o-calendar';
    protected static ?string $navigationGroup = 'Dossier RNCP';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('title')->required(),
            Textarea::make('description'),
            DatePicker::make('due_date')->label('Date limite')->required(),
            Select::make('status')
                ->options([
                    'À faire' => 'À faire',
                    'En cours' => 'En cours',
                    'Terminé' => 'Terminé',
                ])
                ->default('À faire')
                ->label('Statut'),
        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table->columns([
            TextColumn::make('title')->sortable(),
            TextColumn::make('due_date')->label('Date limite')->sortable(),
            BadgeColumn::make('status')
                ->colors([
                    'danger' => 'À faire',
                    'warning' => 'En cours',
                    'success' => 'Terminé',
                ])
                ->sortable(),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDossierDeadlines::route('/'),
            'create' => Pages\CreateDossierDeadline::route('/create'),
            'edit' => Pages\EditDossierDeadline::route('/{record}/edit'),
        ];
    }
}
