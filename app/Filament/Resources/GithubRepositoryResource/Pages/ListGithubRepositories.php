<?php

namespace App\Filament\Resources\GitHubRepositoryResource\Pages;

use App\Filament\Resources\GithubRepositoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGithubRepositories extends ListRecords
{
    protected static string $resource = GithubRepositoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
