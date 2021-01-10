@props(['type' => 'success', 'key' => null])

@php
    switch ($type) {
        case 'info':
            $containerClass = 'bg-blue-100 text-blue-800 border-blue-200';
            $buttonClass = 'bg-blue-200';
            $contentClass = 'text-blue-800';
            $title = 'Information';
            break;

        case 'danger':
            $containerClass = 'bg-red-100 text-red-800 border-red-200';
            $buttonClass = 'bg-red-200';
            $contentClass = 'text-red-800';
            $title = 'Danger';
            break;

        case 'warning':
            $containerClass = 'bg-yellow-100 text-yellow-800 border-yellow-200';
            $buttonClass = 'bg-yellow-200';
            $contentClass = 'text-yellow-800';
            $title = 'Warning';
            break;
        
        default:
            $containerClass = 'bg-green-100 text-green-800 border-green-200';
            $buttonClass = 'bg-green-200';
            $contentClass = 'text-green-800';
            $title = 'Success';
            break;
    }
@endphp

@if(session()->has($key ?? $type))
<div role="alert" x-data="{ hide: false }" x-bind:class="{ 'hidden' : hide }" class="py-2 px-5 border my-1 rounded-lg flex items-center justify-between shadow {{ $containerClass }}"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="transform opacity-0 scale-90"
    x-transition:enter-end="transform opacity-100 scale-100"
    x-transition:leave="transition ease-in duration-300"
    x-transition:leave-start="transform opacity-100 scale-100"
    x-transition:leave-end="transform opacity-0 scale-90">
    <div class="flex space-x-3">
        <div class="flex-shrink-0 w-6 h-6">
            @switch($type)
                @case('info')
                <svg class="w-6 h-6 text-blue-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                </svg>
                    @break
                @case('danger')
                <svg class="w-6 h-6 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                </svg>
                    @break
                @case('warning')
                <svg class="w-6 h-6 text-yellow-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                </svg>
                    @break
                @default
                <svg class="w-6 h-6 text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
            @endswitch
        </div>
        <div class="flex-1 {{ $contentClass }}">
            <div class="font-medium">{{ $title }}</div>
            <div class="text-sm">
                @if (is_array($alert = session($key ?? $type)))
                <ul class="list-disc">
                    @foreach ($alert as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
                @else
                {{ $alert }}
                @endif
            </div>
        </div>
    </div>
    <button type="button" x-on:click="hide = true" class="text-sm font-medium px-3 py-1 rounded-lg focus:outline-none shadow hover:shadow-inner {{ $buttonClass }}">Hide</button>
</div>
@endif