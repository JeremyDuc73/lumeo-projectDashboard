<?php

namespace App\Filament\Widgets;

use App\Models\Note;
use Filament\Widgets\Widget;

class NotesWidget extends Widget
{
    protected static ?int $sort = 5;
    protected static ?string $heading = '📝 Dernières Notes';
    protected int | string | array $columnSpan = 'full';
    protected static string $view = 'filament.widgets.notes-widget';

    public function getData(): array
    {
        return ['notes' => Note::latest()->take(5)->get()];
    }

    public function render(): \Illuminate\Contracts\View\View
    {
        return view('filament.widgets.notes-widget', $this->getData());
    }
}
