<x-filament::widget>
    <x-filament::card>
        <h2 class="text-lg font-bold text-gray-900 dark:text-gray-100">🚀 Dernières Releases</h2>

        <ul class="mt-4 space-y-4">
            @foreach ($releases as $release)
                <li class="p-4 bg-gray-200 dark:bg-gray-800 rounded-lg shadow">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">{{ $release->title }}</h3>
                    <p class="mt-3 mb-2 text-gray-700 dark:text-gray-300">{{ $release->description }}</p>

                    @if ($release->url)
                        <a href="{{ $release->url }}" target="_blank" class="text-blue-600 dark:text-blue-400 hover:underline">
                            🔗 Voir en Production
                        </a>
                    @endif

                    <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Ajouté le : {{ $release->created_at->format('d/m/Y') }}</p>
                </li>
            @endforeach
        </ul>
    </x-filament::card>
</x-filament::widget>
