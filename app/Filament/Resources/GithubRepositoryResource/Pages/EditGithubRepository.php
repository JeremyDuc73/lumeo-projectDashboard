<?php

namespace App\Filament\Resources\GitHubRepositoryResource\Pages;

use App\Filament\Resources\GithubRepositoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGithubRepository extends EditRecord
{
    protected static string $resource = GithubRepositoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
