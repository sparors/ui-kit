@props(['name', 'id' => null, 'valueName' => null, 'show' => 3])

@php
    $extraClass = $errors->has($valueName ?? $name) ? ' border-red-500' : '';
    $show = (int)$show;
@endphp

<div x-data="{ files: [] }" {{ $attributes->except(['multiple', 'accept', 'capture', 'files'])->merge(['class' => 'flex items-center space-x-5 rounded-md border-2 border-gray-300 border-dashed p-3' . $extraClass]) }}>
    <div class="flex items-center space-x-2">
        <div>
            <template x-if="files.length == 0">
                <div class="bg-gray-200 rounded-xl h-16 w-16 ring-2 ring-white flex items-center justify-center text-gray-400 shadow-sm">
                    <svg class="w-10 h-10" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                    </svg>
                </div>
            </template>

            <template x-if="files.length > 0">
                <div class="flex flex-shrink-0">
                    <template x-for="i in (files.length > {{ $show }} ? {{ $show }} : files.length)">
                        <div x-bind:class="{ 
                                'bg-gray-200': !files[i - 1].type.startsWith('image/') && i == 1,
                                '-ml-6 bg-gray-200': !files[i - 1].type.startsWith('image/') && i > 1,
                                'overflow-hidden': files[i - 1].type.startsWith('image/') && i == 1,
                                '-ml-6 overflow-hidden': files[i - 1].type.startsWith('image/') && i > 1,
                            }" class="rounded-xl h-16 w-16 ring-4 ring-white flex items-center justify-center text-gray-400 shadow-sm">
                            <template x-if="!files[i - 1].type.startsWith('image/')">
                                <svg class="w-10 h-10" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                                </svg>
                            </template>
                            <template x-if="files[i - 1].type.startsWith('image/')">
                                <img x-bind:src="URL.createObjectURL(files[i - 1])" class="w-16 h-16 object-cover" />
                            </template>
                        </div>
                    </template>
                </div>
                
            </template>
        </div>

        <span x-show="files.length > {{ $show }}" x-text="'+' + (files.length - {{ $show }})" class="flex-shrink-0 font-medium text-gray-500"></span>
    </div>
    

    <label for="{{ $id ?? $name }}" role="button">
        <span class="inline-block border border-gray-300 shadow-sm rounded py-2 px-5 cursor-pointer bg-white hover:bg-primary-50 font-medium text-gray-700">
            @if ($attributes->has('multiple'))
            Select Files
            @else
            Select File
            @endif
        </span>
        <input x-on:change="files = document.getElementById('{{ $id ?? $name }}').files" name="{{ $name }}" type="file" id="{{ $id ?? $name }}" {{ $attributes->only(['multiple', 'accept', 'capture', 'files'])->merge(['class' => 'hidden']) }}>
    </label>
</div>
