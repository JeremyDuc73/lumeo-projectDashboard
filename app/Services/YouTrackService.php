<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class YouTrackService
{
    private string $baseUrl;
    private string $token;

    public function __construct()
    {
        $this->baseUrl = config('services.youtrack.base_url');
        $this->token = config('services.youtrack.token');
    }


    /**
     * Récupère le nombre d'issues par colonne du Kanban.
     */
    public function getIssuesByColumn(): array
    {
        $backlogTickets = Http::withToken($this->token)
            ->get("$this->baseUrl/issues?query=Backlog&fields=idReadable")
            ->json();
        $backlogCount = count($backlogTickets);

        $toDoTickets = Http::withToken($this->token)
            ->get("$this->baseUrl/issues?query=To%20Do&fields=idReadable")
            ->json();
        $toDoCount = count($toDoTickets);

        $blockedTickets = Http::withToken($this->token)
            ->get("$this->baseUrl/issues?query=Blocked&fields=idReadable")
            ->json();
        $blockedCount = count($blockedTickets);

        $inProgressTickets = Http::withToken($this->token)
            ->get("$this->baseUrl/issues?query=In%20Progress&fields=idReadable")
            ->json();
        $inProgressCount = count($inProgressTickets);

        $inReviewTickets = Http::withToken($this->token)
            ->get("$this->baseUrl/issues?query=In%20Review%20/%20Tests&fields=idReadable")
            ->json();
        $inReviewCount = count($inReviewTickets);

        $completedTickets = Http::withToken($this->token)
            ->get("$this->baseUrl/issues?query=finished&fields=idReadable")
            ->json();
        $completedCount = count($completedTickets);

        $columns = [
            'Backlog' => $backlogCount,
            'To Do' => $toDoCount,
            'Blocked' => $blockedCount,
            'In Progress' => $inProgressCount,
            'In Review / Tests' => $inReviewCount,
            'Finished' => $completedCount,
        ];

        return $columns;
    }
}
