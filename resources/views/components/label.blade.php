@props(['for'])

<label for="{{ $for }}" {{ $attributes->merge(['class' => 'block text-gray-900 font-medium sm:text-sm']) }}>{{ $slot->isNotEmpty() ? $slot : Str::of($for)->replace('_', ' ')->title() }}</label>
