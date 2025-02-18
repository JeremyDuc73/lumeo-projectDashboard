<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;
use App\Models\DossierSection;

class DossierProgress extends Widget
{
    protected static ?int $sort = 3;
    protected int | string | array $columnSpan = 'full';
    protected static string $view = 'filament.widgets.dossier-progress';

    public function getData(): array
    {
        $sections = DossierSection::all();
        $total = $sections->count();
        $completed = $sections->sum('progress') / ($total > 0 ? $total : 1); // Moyenne des progrès

        return [
            'sections' => $sections,
            'totalProgress' => round($completed, 2),
        ];
    }

    public function render(): \Illuminate\Contracts\View\View
    {
        return view('filament.widgets.dossier-progress', $this->getData());
    }
}

