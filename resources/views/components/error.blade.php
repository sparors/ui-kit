@props(['name'])

@error($name)   
<div {{ $attributes->merge(['class' => 'block text-red-600 text-sm font-medium']) }}>{{ $message }}</div>
@enderror
