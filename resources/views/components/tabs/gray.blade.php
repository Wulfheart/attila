@props(['active'])

<a
class="
    px-3 py-2 text-sm font-medium leading-5 focus:outline-none rounded-md
    @if ($active)
     text-gray-800 bg-gray-200   focus:bg-gray-300
    @else
     text-gray-600 hover:text-gray-800 focus:text-gray-800 focus:bg-gray-200
    @endif
    "
    {{ $attributes }}>
    {{ $slot }}
</a>
