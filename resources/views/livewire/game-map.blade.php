<div class="grid place-content-center">
    <img src="data:image/svg+xml;base64,{{ base64_encode($svg) }}" class="max-h-140">
    <div class="flex flex-row justify-center mt-2">
        <button wire:click="previousSVG" wire:loading.attr="disabled" class="grid text-gray-600 h-7 w-7 disabled:opacity-50 place-content-center disabled:cursor-not-allowed" {{ !$this->hasPreviousSVG() ? 'disabled' : '' }}>
            <x-ri-arrow-left-s-line class="fill-current w-7 h-7 " wire:loading.class="hidden" wire:target="previousSVG"></x-ri-arrow-left-s-line>
            <x-spinner class="w-4 h-4 text-gray-600 opacity-100" wire:loading wire:target="previousSVG"></x-spinner>
        </button>
        <button wire:click="nextSVG" wire:loading.attr="disabled" class="grid text-gray-600 h-7 w-7 disabled:opacity-50 place-content-center disabled:cursor-not-allowed" {{ !$this->hasNextSVG() ? 'disabled' : '' }}>
            <x-ri-arrow-right-s-line class="fill-current w-7 h-7 " wire:loading.class="hidden" wire:target="nextSVG"></x-ri-arrow-right-s-line>
            <x-spinner class="w-4 h-4 text-gray-600 opacity-100" wire:loading wire:target="nextSVG"></x-spinner>
        </button>
        
    </div>
</div>
