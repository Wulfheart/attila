<x-app-layout>
    <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="lg:flex lg:items-center lg:justify-between">
            <div class="flex-1 min-w-0">
              <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:leading-9 sm:truncate">
                {{ $game->name }}
              </h2>
              <div class="flex flex-col mt-1 sm:mt-0 sm:flex-row sm:flex-wrap">
                <div class="flex items-center mt-2 text-sm leading-5 text-gray-500 sm:mr-6">
                  <!-- Heroicon name: briefcase -->
                  <x-ri-honour-fill class="flex-shrink-0 w-5 h-5 mr-1 text-gray-400 fill-current"></x-ri-honour-fill>
                  {{ $game->variant->name }}
                </div>
                <div class="flex items-center mt-2 text-sm leading-5 text-gray-500 sm:mr-6">
                  <!-- Heroicon name: briefcase -->
                  <x-ri-gradienter-line class="flex-shrink-0 w-5 h-5 mr-1 text-gray-400 fill-current"></x-ri-gradienter-line>
                  {{ $game->currentPhase->name }}
                </div>
              </div>
            </div>
            <div class="flex mt-5 lg:mt-0 lg:ml-4">
            </div>
          </div>

          <!-- Game -->
          <div class="py-8">
              <livewire:game-map :game="$game"></livewire:game-map>
          </div>
        
    </div>
</x-app-layout>
