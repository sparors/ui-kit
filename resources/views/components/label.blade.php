@props(['for'])

<label for="{{ $for }}" {{ $attributes->merge(['class' => 'block text-gray-800 font-medium tracking-wide']) }}>{{ $slot->isNotEmpty() ? $slot : Str::of($for)->replace('_', ' ')->title() }}</label>
