@props(['color' => 'primary'])

@php
    switch ($color) {
        case 'success':
            $class = 'bg-green-100 text-green-700 font-medium px-5 py-1.5 rounded-full text-sm';
            break;

        case 'info':
            $class = 'bg-blue-100 text-blue-700 font-medium px-5 py-1.5 rounded-full text-sm';
            break;

        case 'danger':
            $class = 'bg-red-100 text-red-700 font-medium px-5 py-1.5 rounded-full text-sm';
            break;

        case 'warning':
            $class = 'bg-yellow-100 text-yellow-700 font-medium px-5 py-1.5 rounded-full text-sm';
            break;
        
        default:
            $class = 'bg-primary-100 text-primary-700 font-medium px-5 py-1.5 rounded-full text-sm';
            break;
    }
@endphp

<span {{ $attributes->merge(['class' => $class]) }}>
    {{ $slot }}
</span>
