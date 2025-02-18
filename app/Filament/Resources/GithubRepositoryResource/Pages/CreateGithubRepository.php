<?php

namespace App\Filament\Resources\GitHubRepositoryResource\Pages;

use App\Filament\Resources\GithubRepositoryResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateGithubRepository extends CreateRecord
{
    protected static string $resource = GithubRepositoryResource::class;
}
