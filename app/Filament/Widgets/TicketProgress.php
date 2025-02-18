<?php

namespace App\Filament\Resources\DashboardResource\Widgets;

use Filament\Widgets\Widget;
use Illuminate\Support\Facades\Http;

class TicketProgress extends Widget
{
    protected static ?int $sort = 1;
    protected int | string | array $columnSpan = 'full';

    protected static string $view = 'filament.resources.dashboard.widgets.ticket-progress';

    public function getData(): array
    {
        $baseUrl = config('services.youtrack.base_url');
        $token = config('services.youtrack.token');

        $totalTickets = Http::withToken($token)
            ->get("$baseUrl/issues?fields=idReadable")
            ->json();

        $completedTickets = Http::withToken($token)
            ->get("$baseUrl/issues?query=finished&fields=idReadable")
            ->json();

        $totalCount = count($totalTickets);
        $completedCount = count($completedTickets);
        $progress = $totalCount > 0 ? ($completedCount / $totalCount) * 100 : 0;

        return [
            'total' => $totalCount,
            'completed' => $completedCount,
            'progress' => round($progress, 2),
        ];
    }

    public function render(): \Illuminate\Contracts\View\View
    {
        return view('filament.widgets.ticket-progress', $this->getData());
    }
}
