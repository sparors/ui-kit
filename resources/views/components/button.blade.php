@props(['type' => 'button', 'color' => 'primary', 'url' => null])

@php
    switch ($color) {
        case 'secondary':
            $class = 'inline-flex items-center justify-center py-2 px-5 space-x-2 border border-transparent capitalize tracking-wide bg-primary-100 shadow-sm text-primary-700 font-medium rounded focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 hover:bg-primary-200';
            break;

        case 'white':
            $class = 'inline-flex items-center justify-center py-2 px-5 space-x-2 border border-gray-300 capitalize tracking-wide bg-white shadow-sm text-gray-700 font-medium rounded focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 hover:bg-primary-50';
            break;
        
        default:
            $class = 'inline-flex items-center justify-center py-2 px-5 space-x-2 border border-transparent capitalize tracking-wide bg-primary-600 shadow-sm text-white font-medium rounded focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 hover:bg-primary-500';
            break;
    }
@endphp

@if ($url == null)
<button {{ $attributes->merge(['type' => $type, 'class' => $class]) }}>
    {{ $slot }}
</button>
@else
<a {{ $attributes->merge(['href' => $url, 'class' => $class]) }}>
    {{ $slot }}
</a>
@endif
