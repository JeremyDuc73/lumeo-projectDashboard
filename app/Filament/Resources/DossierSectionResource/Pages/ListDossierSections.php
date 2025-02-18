<?php

namespace App\Filament\Resources\DossierSectionResource\Pages;

use App\Filament\Resources\DossierSectionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDossierSections extends ListRecords
{
    protected static string $resource = DossierSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
