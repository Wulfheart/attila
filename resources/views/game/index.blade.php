<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
      Games
    </h2>
  </x-slot>
  <div class="py-12">
    <div class="max-w-4xl px-4 mx-auto sm:px-6 lg:px-8">
      <!-- Tabs -->
      <div>
        <div class="sm:hidden">
          <select aria-label="Selected tab" class="block w-full form-select">
            <option value="yours" {{ $type == 'new' ? 'selected' : '' }}>Your Games ({{ $count['yours'] }})</option>
            <option value="new" {{ $type == 'new' ? 'selected' : '' }}>New Games ({{ $count['new'] }})</option>
            <option value="active" {{ $type == 'active' ? 'selected' : '' }}>Active ({{ $count['active'] }})</option>
            <option value="finished" {{ $type == 'finished' ? 'selected' : '' }}>Finished ({{ $count['finished'] }})
            </option>
          </select>
        </div>
        <div class="hidden sm:block">
          <nav class="flex space-x-4">
            <x-tabs.gray href="{{ route('games.index', ['type' => 'yours']) }}" :active="$type == 'yours'">
              Your Games ({{ $count['yours'] }})
            </x-tabs.gray>
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

      <!-- Games -->
      <div class="grid max-w-4xl gap-6 mt-6 lg:grid-cols-1">
        @foreach ($games as $game)
        <div class="overflow-hidden bg-white rounded-lg shadow">
          <div class="px-4 py-5 border-b border-gray-200 sm:px-6">
            <!-- Heading goes here -->
            <a href="{{ route('games.show', ['game' => $game]) }}"
              class="text-lg font-medium leading-6 text-gray-900 hover:underline">
              {{ $game->name }}
            </a>
            <div class="flex flex-col mt-1 sm:mt-0 sm:flex-row sm:flex-wrap">
              <div class="flex items-center mt-2 text-xs leading-5 text-gray-500 sm:mr-6">
                <!-- Heroicon name: briefcase -->
                <x-ri-honour-fill class="flex-shrink-0 w-4 h-4 mr-1 text-gray-400 fill-current"></x-ri-honour-fill>
                {{ $game->variant->name }}
              </div>
              @if ($game->started)
              <div class="flex items-center mt-2 text-xs leading-5 text-gray-500 sm:mr-6">
                <!-- Heroicon name: briefcase -->
                <x-ri-gradienter-line class="flex-shrink-0 w-4 h-4 mr-1 text-gray-400 fill-current">
                </x-ri-gradienter-line>
                {{ $game->currentPhase->name }}
              </div>
              @endif
              <x-attila.countdown :seconds="$game->currentPhase->secondsLeft"></x-attila.countdown>
            </div>
          </div>
          <div>
            @if ($game->started)
            <div class="flex flex-row w-full divide-x-2">
              @php
              $phasedata = $game->currentPhase->phasePowerData()->with('power.basePower', 'power.user')->get();
              $scs_used = $phasedata->sum('supply_centers_count');
              @endphp
              @foreach ($phasedata as $ppd)
              <div class="h-2 "
                style="width: {{ ($ppd->supply_centers_count / $scs_used) * 100 }}%; background-color: {{ $ppd->power->basePower->color }}">
              </div>
              @endforeach
            </div>
            @endif
          </div>
          <div class="">
            <!-- Body comes here -->
            @if ($game->started)
            <ul>
              @foreach ($phasedata as $pd)
              <li class="odd:bg-gray-50 ">
                <span class="block transition duration-150 ease-in-out">
                  <div class="w-full px-4 py-4 sm:px-6">
                    <div class="grid w-full min-w-0 md:grid-cols-3">
                      <div>
                        <div class="flex flex-row text-sm font-medium leading-5 truncate"
                          style="color: {{ $pd->power->basePower->color }}">
                          {{ $pd->power->basePower->name }}
                        </div>

                      </div>
                      <div class="flex justify-start text-sm text-gray-500">
                          <x-user.link :user="$pd->power->user"></x-user.link>
                      </div>
                      <div class="grid place-content-end">
                        <div class="text-xs text-gray-700">
                          {{ $pd->supply_centers_count }} supply centers, {{ $pd->unit_count }} units
                        </div>
                      </div>
                    </div>
                  </div>
                </span>
              </li>
              @endforeach
            </ul>
            @endif
           
          </div>
          <div class="px-4 py-4 border-t border-gray-200 sm:px-6">
            <!-- Footer goes here -->
            <div class="flex flex-row-reverse justify-between">
              @can('join', $game)
              <x-form :action="route('games.join', ['game' => $game])">
                <x-button intent="primary" type="join">Join</x-button>
              </x-form>
              @endcan
              @can('view', $game)
              <a href="{{ route('games.show', ['game' => $game]) }}">
                <x-button intent="plain">
                  <x-slot name="icon">
                    <x-ri-eye-2-line class="w-full h-full fill-current"></x-ri-eye-2-line>
                  </x-slot>
                  View
                </x-button>
              </a>
              @endcan
             
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</x-app-layout>
