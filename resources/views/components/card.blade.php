@props(['header' => null, 'footer' => null])

<div {{ $attributes->merge(['class' => 'bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200']) }}>
    @if ($header != null)
    <div class="px-4 py-5 sm:px-6">
        {{ $header }}
    </div>
    @endif
    <div class="px-4 py-5 sm:p-6">
        {{ $slot }}
    </div>
    @if ($footer != null)
    <div class="bg-gray-50 px-4 py-4 sm:px-6">
        {{ $footer }}
    </div>
    @endif
</div>
