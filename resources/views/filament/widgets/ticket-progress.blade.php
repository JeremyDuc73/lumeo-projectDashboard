<x-filament::widget>
    <x-filament::card>
        <div class="flex flex-col space-y-4">
            <h2 class="text-lg font-bold">Progression des Tickets</h2>
            <div class="w-full bg-gray-200 rounded-full h-6 dark:bg-gray-700">
                <div class="bg-blue-600 h-6 rounded-full" style="width: {{ $progress }}%;"></div>
            </div>
            <p>{{ $completed }} / {{ $total }} tickets complétés</p>
        </div>
    </x-filament::card>
</x-filament::widget>
