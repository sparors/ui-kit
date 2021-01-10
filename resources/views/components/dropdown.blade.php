@props(['trigger', 'id' => null, 'color' => 'primary', 'position' => 'right'])

@php
    $id = $id ?: mt_rand();
    
    switch ($position) {
        case 'left':
            $class = 'z-10 origin-top-left absolute left-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-gray-100';
            break;
        
        default:
            $class = 'z-10 origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-gray-100';
            break;
    }
@endphp

<div x-data="{ isOpen: false }" class="relative inline-block">
    @if ($trigger instanceof Illuminate\Support\HtmlString)
    <button {{ $attributes->merge(['x-on:click' => 'isOpen = !isOpen', 'x-on:click.away' => 'isOpen = false', 'class' => 'focus:outline-none flex items-center', 'type' => 'button', 'id' => $id]) }}>{{ $trigger }}</button>
    @else
    <x-ui-button class="inline-flex items-center justify-center focus:outline-none" x-on:click="isOpen = !isOpen" x-on:click.away="isOpen = false" :color="$color" id="{{ $id }}">{{ $trigger }}</x-ui-button>
    @endif
    <div x-show="isOpen" class="{{ $class }}"
        x-transition:enter="transition ease-out duration-100"
        x-transition:enter-start="transform opacity-0 scale-95"
        x-transition:enter-end="transform opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="transform opacity-100 scale-100"
        x-transition:leave-end="transform opacity-0 scale-95">
        <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="{{ $id }}">
            {{ $slot }}
        </div>
    </div>
</div>
