<?php

namespace App\Filament\Widgets;

use App\Services\YouTrackService;
use Filament\Widgets\ChartWidget;

class YouTrackKanbanChart extends ChartWidget
{
    protected static ?int $sort = 6;
    protected static ?string $heading = 'Répartition des Tickets';

    protected int | string | array $columnSpan = 'full';

    protected function getData(): array
    {
        $service = new YouTrackService();
        $data = $service->getIssuesByColumn();

        return [
            'datasets' => [
                [
                    'label' => 'Tickets',
                    'data' => array_values($data),
                    'backgroundColor' => ['red', 'blue', 'yellow', 'orange', 'purple', 'green'],
                ],
            ],
            'labels' => array_keys($data),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
