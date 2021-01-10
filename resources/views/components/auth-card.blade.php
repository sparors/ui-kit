@props(['footer' => null])

<div class="overflow-hidden shadow-md rounded-md border-t-4 border-primary-500 w-full max-w-sm">
    <div class="bg-white px-4 py-5">
        {{ $slot }}
    </div>
    @if($footer != null)
    <div class="bg-gray-50 px-4 py-4">
        {{ $footer }}
    </div>
    @endif
</div>