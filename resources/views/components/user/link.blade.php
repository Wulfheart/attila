@props(['user'])

<div class="flex flex-row">
    <x-link href="#">{{ $user->name }}</x-link>
    @canImpersonate($guard = null)
    <a href="{{ route('impersonate', $user->id) }}" class="w-4 h-4 ml-2 text-gray-500" >
        <x-ri-remote-control-line class="fill-current"></x-ri-remote-control-line>
    </a>
    @endCanImpersonate
</div>
