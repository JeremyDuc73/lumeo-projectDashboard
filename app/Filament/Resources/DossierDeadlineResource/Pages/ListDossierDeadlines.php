<?php

namespace App\Filament\Resources\DossierDeadlineResource\Pages;

use App\Filament\Resources\DossierDeadlineResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDossierDeadlines extends ListRecords
{
    protected static string $resource = DossierDeadlineResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
