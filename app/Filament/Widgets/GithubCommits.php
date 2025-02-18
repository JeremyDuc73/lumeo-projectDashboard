<?php

namespace App\Filament\Widgets;

use App\Services\GithubService;
use Filament\Widgets\Widget;

class GithubCommits extends Widget
{
    protected static ?int $sort = 4;
    protected static ?string $heading = '📌 Suivi des Commits GitHub';
    protected int | string | array $columnSpan = 'full';
    protected static string $view = 'filament.widgets.github-commits';

    public function getData(): array
    {
        $gitHubService = new GithubService();
        $repositoriesCommits = $gitHubService->getAllRepositoriesCommits(10);

        return ['repositoriesCommits' => $repositoriesCommits];
    }

    public function render(): \Illuminate\Contracts\View\View
    {
        return view('filament.widgets.github-commits', $this->getData());
    }
}
