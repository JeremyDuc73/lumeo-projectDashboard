<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use App\Models\GithubRepository;

class GithubService
{
    private string $baseUrl;
    private string $token;

    public function __construct()
    {
        $this->baseUrl = "https://api.github.com/repos";
        $this->token = config('services.github.token');
    }

    /**
     * Récupère les commits d'un dépôt spécifique
     */
    public function getCommits(string $owner, string $repo, int $limit = 5): array
    {
        $url = "{$this->baseUrl}/{$owner}/{$repo}/commits";
        $response = Http::withToken($this->token)
            ->get($url, ['per_page' => $limit]);

        return $response->successful() ? array_slice($response->json(), 0, $limit) : [];
    }

    /**
     * Récupère les commits pour tous les dépôts stockés en base
     */
    public function getAllRepositoriesCommits(int $limit = 10): array
    {
        $repositories = GithubRepository::all();
        $commitsData = [];

        foreach ($repositories as $repo) {
            $commitsData[] = [
                'repository' => "{$repo->owner}/{$repo->name}",
                'commits' => $this->getCommits($repo->owner, $repo->name, $limit)
            ];
        }

        return $commitsData;
    }
}
