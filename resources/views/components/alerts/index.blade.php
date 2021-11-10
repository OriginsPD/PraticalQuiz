@props([
    'message' => false,
    'alpName' => false,
    'status' => false
])

@php

    $theme = ($status ?? false) ? 'bg-red-500' : 'bg-green-500'

@endphp

<div x-data="{ isAlert: false }"

     x-on:close-alert.window="isAlert = true" class="w-full text-white {{ $theme }}">

    <div x-show="isAlert"
        class="container flex items-center justify-between px-4 py-2 mx-auto">

        <div class="flex">

            @if($status)

                <i class="fas fa-exclamation-triangle mt-0.5"></i>

            @else

                <i class="fas fa-shield-check mt-0.5"></i>

            @endif

            <p class="mx-3 my-auto">{{ $message }}</p>

        </div>

        {{ $slot }}

    </div>

</div>
