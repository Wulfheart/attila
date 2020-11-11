@props(['icon' => null, 'intent' => 'default', 'type' => 'button', 'full' => false])

@php
    switch ($intent) {
        case 'primary':
            $colors = "bg-gray-800 hover:bg-gray-700 active:bg-gray-900 focus:border-gray-900 focus:shadow-outline-gray";
            break;
        case 'danger':
            $colors = "bg-danger-600 hover:bg-danger-500 focus:border-danger-700 active:bg-danger-700 focus:shadow-outline-danger";
            break;
        case 'plain':
            $colors = "bg-white hover:bg-gray-100 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue text-gray-700";
        break;
    
        default:
            $colors = "bg-white hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue text-gray-700 hover:text-gray-500 border border-gray-300 ";
            break;
    }
@endphp

<span class="inline-flex rounded-md {{ $intent != 'plain' ? 'shadow-sm' : '' }} {{ $full ? 'w-full' : '' }}">
    <button type="{{ $type }}" class="inline-flex items-center px-4 py-2 text-xs font-medium leading-5 text-white transition duration-150 uppercase ease-in-out border border-transparent rounded-md focus:outline-none disabled:opacity-25 {{ $colors }} {{ $full ? 'w-full text-center' : '' }}" {{ $attributes }}>
        @isset($icon)
        <div class="w-4 h-4 mr-1 -ml-1 fill-current">
            {{ $icon }}
        </div>
        @endisset
        <div class="{{ $full ? 'w-full text-center' : '' }}">
            {{ $slot }}
        </div>
    </button>
  </span>
