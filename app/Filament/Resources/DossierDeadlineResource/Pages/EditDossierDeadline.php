<?php

namespace App\Filament\Resources\DossierDeadlineResource\Pages;

use App\Filament\Resources\DossierDeadlineResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDossierDeadline extends EditRecord
{
    protected static string $resource = DossierDeadlineResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
