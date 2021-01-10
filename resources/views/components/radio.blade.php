@props(['name', 'title', 'value', 'id' => null, 'subtitle' => null, 'valueName' => null, 'checked' => false])

<div class="flex space-x-3 {{ $subtitle == null ? 'items-center' : 'items-start' }}">
    <div>
        <input type="radio" id="{{ $id ?? $name }}" name="{{ $name }}" value="{{ $value }}" @if($value == old($valueName ?? $name) || $checked) checked @endif {{ $attributes->merge(['class' => 'text-primary-600 border-gray-300 focus:ring-primary-500']) }}>
    </div>
    <div class="text-sm">
        <label class="text-gray-700 font-medium tracking-wide" for="{{ $id ?? $name }}">{{ $title }}</label>
        @if($subtitle)
        <p class="text-gray-500">{{ $subtitle }}</p>
        @endif
    </div>
</div>
