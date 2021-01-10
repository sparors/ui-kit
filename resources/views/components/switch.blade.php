@props(['name', 'id' => null, 'valueName' => null, 'isOn' => false, 'on' => null, 'off' => null])

<button x-data="{{ json_encode(['isOn' => old($valueName ?? $name, $isOn) == ($on ?? true), 'on' => $on ?? true, 'off' => $off ?? false, 'input' => '']) }}" x-init="$watch('isOn', value => input = value ? on : off)" x-on:click="isOn = !isOn" x-bind:class="{ 'bg-primary-600': isOn, 'bg-gray-200': !isOn }" type="button" aria-pressed="false" class="bg-gray-200 relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
    <span class="sr-only">{{ $name }}</span>
    <span x-bind:class="{ 'translate-x-5': isOn, 'translate-x-0': !isOn }" aria-hidden="true" class="inline-block h-5 w-5 rounded-full bg-white shadow transform ring-0 transition ease-in-out duration-200 @if($isOn) translate-x-5 @else translate-x-0 @endif"></span>
    <input x-model="input" type="text" name="{{ $name }}" id="{{ $id ?? $name }}" class="hidden">
</button>

