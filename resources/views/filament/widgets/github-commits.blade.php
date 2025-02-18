<x-filament::widget>
    <x-filament::card>
        <h2 class="text-lg font-bold text-gray-900 dark:text-gray-100">📌 Suivi des Commits GitHub</h2>

        @foreach ($repositoriesCommits as $repoData)
            <div class="mt-4 p-4 bg-gray-200 dark:bg-gray-800 rounded-lg shadow">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">{{ $repoData['repository'] }}</h3>

                <ul class="mt-2 space-y-3">
                    @foreach ($repoData['commits'] as $commit)
                        <li class="p-3 rounded-lg shadow bg-white dark:bg-gray-700">
                            <p class="font-semibold text-gray-900 dark:text-gray-100">{{ $commit['commit']['message'] }}</p>
                            <p class="mt-2 mb-2 text-sm text-gray-600 dark:text-gray-300">
                                ✍️ {{ $commit['commit']['author']['name'] }} | 🕒 {{ \Carbon\Carbon::parse($commit['commit']['author']['date'])->format('d/m/Y H:i') }}
                            </p>
                            <a href="{{ $commit['html_url'] }}" target="_blank" class="text-blue-600 dark:text-blue-400 hover:underline">
                                🔗 Voir le commit
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endforeach
    </x-filament::card>
</x-filament::widget>
