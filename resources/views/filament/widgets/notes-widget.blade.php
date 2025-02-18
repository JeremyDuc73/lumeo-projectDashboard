<x-filament::widget>
    <x-filament::card>
        <h2 class="text-lg font-bold text-gray-900 dark:text-gray-100">📝 Dernières Notes</h2>

        <ul class="mt-4 space-y-4">
            @foreach ($notes as $note)
                <li class="p-4 bg-gray-200 dark:bg-gray-800 rounded-lg shadow">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">{{ $note->title }}</h3>
                    <p class="text-gray-700 dark:text-gray-300">{!! \Illuminate\Support\Str::limit($note->content, 150) !!}</p>

                    <a href="{{ route('filament.admin.resources.notes.edit', $note) }}" class="text-blue-600 dark:text-blue-400 hover:underline">
                        ✏️ Modifier
                    </a>
                </li>
            @endforeach
        </ul>
    </x-filament::card>
</x-filament::widget>
