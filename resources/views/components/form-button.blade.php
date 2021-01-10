@props(['url', 'method' => 'POST', 'color' => 'primary', 'title' => null])

<x-ui-form :action="$url" :method="$method">
    @if ($title == null)
    <a href="{{ $url }}" onclick="event.preventDefault();this.closest('form').submit();" {{ $attributes }}>
        {{ $slot }}
    </a>
    @else
    <x-ui-button :color="$color" onclick="event.preventDefault();this.closest('form').submit();">{{ $title }}</x-ui-button>
    @endif
</x-ui-form>