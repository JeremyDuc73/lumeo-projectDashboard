<?php

namespace App\Filament\Widgets;

use App\Models\Release;
use Filament\Widgets\Widget;

class ReleasesWidget extends Widget
{
    protected static ?string $heading = '🚀 Dernières Releases';
    protected int | string | array $columnSpan = 'full';
    protected static string $view = 'filament.widgets.releases-widget';

    protected static ?int $sort = 2;

    public function getData(): array
    {
        return ['releases' => Release::latest()->take(5)->get()];
    }

    public function render(): \Illuminate\Contracts\View\View
    {
        return view('filament.widgets.releases-widget', $this->getData());
    }
}
