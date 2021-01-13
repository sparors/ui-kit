@props(['logo', 'navigations', 'menu', 'menuIcon', 'heading', 'actions'])

<div>
    <nav x-data="{ show: false }" class="bg-gray-800 w-full">
        <div id="navbar">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between h-16">
                <div class="flex md:hidden flex-shrink-0 items-center">
                    <button x-on:click="show = !show" x-on:click.away="show = false" class="p-2 rounded-lg text-gray-400 focus:outline-none hover:text-white hover:bg-gray-700 focus:ring-2 focus:ring-offset-2 focus:ring-gray-800">
                        <svg x-show="!show" class="w-6 h-6 block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
                        </svg>

                        <svg x-show="show" class="w-6 h-6 block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="flex items-center space-x-5">
                    <div class="flex-shrink-0">
                        <img src="{{ $logo }}" class="w-8 h-8 object-cover object-center" />
                    </div>
                    <div class="hidden md:flex items-center space-x-3">
                        @foreach ($navigations as $navigation)
                            @if (request()->is($navigation['active']))
                            <a href="{{ $navigation['route'] }}" class="text-white text-sm font-medium tracking-wide px-3 py-2 rounded-md bg-gray-900">{{ $navigation['name'] }}</a>
                            @else
                            <a href="{{ $navigation['route'] }}" class="text-gray-300 text-sm font-medium tracking-wide px-3 py-2 rounded-md hover:text-white hover:bg-gray-700">{{ $navigation['name'] }}</a>
                            @endif    
                        @endforeach
                    </div>
                </div>
                <div class="flex-shrink-0 flex items-center">
                    <x-ui-dropdown>
                        <x-slot name="trigger">
                            <img class="h-8 w-8 rounded-full focus:ring-2" src="{{ $menuIcon }}">
                        </x-slot>
    
                        {{ $menu }}
                    </x-ui-dropdown>
                </div>
            </div>
        </div>
        <div x-show="show" class="block md:hidden px-2 space-y-1 pb-3 pt-2 border-t border-gray-700">
            @foreach ($navigations as $navigation)
                @if (request()->is($navigation['active']))
                <a href="{{ $navigation['route'] }}" class="block text-white text-sm font-medium tracking-wide px-3 py-2 rounded-md bg-gray-900">{{ $navigation['name'] }}</a>
                @else
                <a href="{{ $navigation['route'] }}" class="block text-gray-300 text-sm font-medium tracking-wide px-3 py-2 rounded-md hover:text-white hover:bg-gray-700">{{ $navigation['name'] }}</a>
                @endif    
            @endforeach
        </div>
    </nav>
    <header class="bg-white shadow w-full">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 md:flex md:items-center md:justify-between">
            <div class="py-4 font-semibold text-xl leading-tight tracking-wide text-gray-900">
                {{ $heading }}
            </div>
            <div class="md:flex-shrink-0 flex items-center space-x-2 py-2">
                {{ $actions ?? '' }}
            </div>
        </div>
    </header>
</div>