@props(['name', 'id' => null, 'valueName' => null, 'value' => null, 'rows' => 3])

@php
    $extraClass = $errors->has($valueName ?? $name) ? ' border-red-500' : '';
@endphp

<textarea name="{{ $name }}" id="{{ $id ?? $name }}" rows="{{ $rows }}" {{ $attributes->merge(['class' => 'block w-full rounded border-gray-300 shadow-sm text-gray-700 focus:border-primary-300 focus:ring focus:ring-primary-200 focus:ring-opacity-50' . $extraClass]) }}>{{ old($valueName ?? $name, $value) }}</textarea>
