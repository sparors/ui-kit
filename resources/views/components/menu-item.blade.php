@props(['url' => null])

@if ($url == null)
<span {{ $attributes->merge(['class' => 'block space-x-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900', 'role' => 'menuitem']) }}>
    {{ $slot }}
</span>
@else    
<a href="{{ $url }}" {{ $attributes->merge(['class' => 'block space-x-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900', 'role' => 'menuitem']) }}>
    {{ $slot }}
</a>
@endif
