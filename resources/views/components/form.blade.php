@props(['action', 'method' => 'POST'])

<form action="{{ $action }}" method="{{ strtoupper($method) === 'GET' ? 'GET' : 'POST' }}" @if($attributes->has('has-files')) enctype="multipart/form-data" @endif {{ $attributes->except('has-files') }}>
    @csrf

    @if (!in_array($method, ['GET', 'POST']))
        @method($method)
    @endif

    {{ $slot }}
</form>
