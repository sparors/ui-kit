@props(['name', 'title', 'value' => 'on', 'id' => null, 'subtitle' => null, 'valueName' => null, 'checked' => false])

<div class="flex space-x-3 {{ $subtitle == null ? 'items-center' : 'items-start' }}">
    <div>
        <input type="checkbox" id="{{ $id ?? $name }}" name="{{ $name }}" @if($value) value="{{ $value }}" @endif @if((is_array(old($valueName ?? $name)) ? in_array($value, old($valueName ?? $name)) : $value == old($valueName ?? $name)) || $checked) checked @endif {{ $attributes->merge(['class' => 'rounded border-gray-300 text-primary-600 focus:ring-primary-500']) }}>
    </div>
    <div class="text-sm">
        <label class="text-gray-700 font-medium tracking-wide" for="{{ $id ?? $name }}">{{ $title }}</label>
        @if($subtitle)
        <p class="text-gray-500">{{ $subtitle }}</p>
        @endif
    </div>
</div>