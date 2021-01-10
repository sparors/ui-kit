@props(['name', 'id' => null, 'valueName' => null])

@php
    $extraClass = $errors->has($valueName ?? $name) ? ' border-red-500' : '';
@endphp

<input name="{{ $name }}" type="password" id="{{ $id ?? $name }}" {{ $attributes->merge(['class' => 'block w-full rounded border-gray-300 shadow-sm text-gray-700 focus:border-primary-300 focus:ring focus:ring-primary-200 focus:ring-opacity-50' . $extraClass]) }}>
