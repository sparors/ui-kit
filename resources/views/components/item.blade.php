@props(['title', 'subtitle' => null, 'image' => null])

<div {{ $attributes->merge(['class' => 'flex items-center space-x-3']) }}>
    @if ($image != null)
        <div class="flex-shrink-0 h-10 w-10">
            <img src="{{ $image }}" class="w-10 h-10 object-cover object-center rounded-full">
        </div>
    @endif
    <div class="whitespace-nowrap">
        <div>{{ $title }}</div>
        @if ($subtitle != null)
            <div class="text-gray-500 text-sm">{{ $subtitle }}</div>
        @endif
    </div>
</div>
