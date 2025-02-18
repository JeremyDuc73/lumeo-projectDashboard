<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DossierSectionResource\Pages;
use App\Models\DossierSection;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Rupadana\FilamentSlider\Components\Concerns\InputSliderBehaviour;
use Rupadana\FilamentSlider\Components\InputSlider;
use Rupadana\FilamentSlider\Components\InputSliderGroup;

class DossierSectionResource extends Resource
{
    protected static ?string $model = DossierSection::class;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Dossier RNCP';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            TextInput::make('title')->disabled(),

            InputSliderGroup::make()
                ->sliders([
                    InputSlider::make('progress')->default(fn ($record) => $record?->progress ?? 0),
                ])
                ->max(100)
                ->min(0)
                ->step(5)
                ->behaviour([
                    InputSliderBehaviour::DRAG,
                    InputSliderBehaviour::TAP
                ])
                ->enableTooltips()
                ->label('Avancement (%)')
        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table->columns([
            TextColumn::make('title')->sortable(),
            TextColumn::make('progress')->sortable(),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDossierSections::route('/'),
            'edit' => Pages\EditDossierSection::route('/{record}/edit'),
        ];
    }
}
