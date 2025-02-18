<x-filament::widget>
    <x-filament::card>
        <div class="space-y-4">
            <h2 class="text-lg font-bold">📖 Suivi d'Avancement du Dossier RNCP</h2>

            <div class="w-full bg-gray-200 rounded-full h-6 dark:bg-gray-700 relative overflow-hidden">
                <div class="absolute top-0 left-0 h-6 bg-green-600 transition-all duration-500 ease-in-out"
                     style="width: {{ $totalProgress }}%;">
                </div>
            </div>
            <p class="text-center text-sm font-medium">
                Progression totale : {{ $totalProgress }}%
            </p>

            <ul class="mt-4 space-y-2">
                @foreach ($sections as $section)
                    <li class="flex items-center justify-between">
                        <span>{{ $section->title }}</span>
                        <div class="flex justify-between gap-4">
                            <div class="w-72 bg-gray-300 rounded-full h-4">
                                <div class="bg-blue-600 h-4 rounded-full"
                                     style="width: {{ $section->progress }}%;">
                                </div>
                            </div>
                            <span>{{ $section->progress }}%</span>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </x-filament::card>
</x-filament::widget>
