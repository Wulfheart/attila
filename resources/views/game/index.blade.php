<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Games
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <!-- Tabs -->
            <div>
                <div class="sm:hidden">
                    <select aria-label="Selected tab" class="block w-full form-select">
                        <option value="new" {{ $type == 'new' ? 'selected' : '' }}>New Games ({{ $count['new'] }})</option>
                        <option value="active" {{ $type == 'active' ? 'selected' : '' }}>Active ({{ $count['active'] }})</option>
                        <option value="finished" {{ $type == 'finished' ? 'selected' : '' }}>Finished ({{ $count['finished'] }})</option>
                    </select>
                </div>
                <div class="hidden sm:block">
                    <nav class="flex space-x-4">
                        <x-tabs.gray href="{{ route('games.index', ['type' => 'new']) }}" :active="$type == 'new'">
                            New Games ({{ $count['new'] }})
                        </x-tabs.gray>
                        <x-tabs.gray href="{{ route('games.index', ['type' => 'active']) }}" :active="$type == 'active'">
                            Active ({{ $count['active'] }})
                        </x-tabs.gray>
                        <x-tabs.gray href="{{ route('games.index', ['type' => 'finished']) }}" :active="$type == 'finished'">
                            Finished ({{ $count['finished'] }})
                        </x-tabs.gray>
                    </nav>
                </div>
            </div>


        </div>
    </div>
</x-app-layout>
