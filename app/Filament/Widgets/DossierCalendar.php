<?php

namespace App\Filament\Widgets;

use Saade\FilamentFullCalendar\Widgets\FullCalendarWidget;
use App\Models\DossierDeadline;
use Filament\Notifications\Notification;

class DossierCalendar extends FullCalendarWidget
{
    protected static ?int $sort = 7;
    protected int | string | array $columnSpan = 'full';
    protected static bool $isLazy = true;

    public function fetchEvents(array $info): array
    {
        return DossierDeadline::all()->map(fn ($event) => [
            'id' => $event->id,
            'title' => $event->title,
            'start' => $event->due_date,
            'color' => match ($event->status) {
                'À faire' => 'red',
                'En cours' => 'orange',
                'Terminé' => 'green',
            },
        ])->toArray();
    }

    public function onEventClick(array $event): void
    {
        $deadline = DossierDeadline::find($event['id']);

        if ($deadline) {
            $this->redirect(route('filament.admin.resources.dossier-deadlines.edit', $deadline));
        } else {
            Notification::make()
                ->title("Événement non trouvé")
                ->danger()
                ->send();
        }
    }
}
