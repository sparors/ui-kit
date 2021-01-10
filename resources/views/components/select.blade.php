@props(['name', 'options', 'id' => null, 'valueName' => null, 'value' => null, 'nullable' => false])

@php
    $extraClass = $errors->has($valueName ?? $name) ? ' border-red-500' : '';
@endphp

<select name="{{ $name }}" id="{{ $id ?? $name }}" {{ $attributes->merge(['class' => 'block w-full rounded border-gray-300 shadow-sm text-gray-700 focus:border-primary-300 focus:ring focus:ring-primary-200 focus:ring-opacity-50' . $extraClass]) }}>
    @if($nullable)
    <option value="">{{ is_string($nullable) && strlen($nullable) > 2 ? $nullable : 'Select an option' }}</option>
    @endif
    @foreach ($options as $option)
        <option value="{{ is_array($option) ? $option['value'] : $option }}" @if(old($valueName ?? $name, $value) == (is_array($option) ? $option['value'] : $option)) selected @endif>
            @if(is_array($option))
            {{ array_key_exists('name', $option) ? $option['name'] : Str::of($option['value'])->replace('_', ' ')->title() }}
            @else
            {{ Str::of($option)->replace('_', ' ')->title() }}
            @endif
        </option>
    @endforeach
</select>
