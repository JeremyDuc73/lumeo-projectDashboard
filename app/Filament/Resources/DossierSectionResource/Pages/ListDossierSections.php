<?php

namespace App\Filament\Resources\DossierSectionResource\Pages;

use App\Filament\Resources\DossierSectionResource;
use App\Models\DossierSection;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDossierSections extends ListRecords
{
    protected static string $resource = DossierSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->mutateFormDataUsing(function (array $data): array {
                $data['progress'] = intval($data['progress'] ?? 0);
                return $data;
            })
        ];
    }
}
