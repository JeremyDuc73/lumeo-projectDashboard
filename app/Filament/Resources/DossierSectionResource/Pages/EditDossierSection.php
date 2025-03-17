<?php

namespace App\Filament\Resources\DossierSectionResource\Pages;

use App\Filament\Resources\DossierSectionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDossierSection extends EditRecord
{
    protected static string $resource = DossierSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['progress'] = intval($data['progress'] ?? 0);
        return $data;
    }
}
