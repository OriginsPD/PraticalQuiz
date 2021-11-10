@props([
    'alpName' => false,
    'grid' => 2,
    'class' => false
])

@php

$classDefault = ' p-8 mx-auto bg-white  shadow-md dark:bg-gray-800 ';

$classDefault .= ($class ?? false)
                 ? $class
                 : ''

@endphp

<section x-data="{ {{ $alpName }}: true }"
         x-on:show-modal.window="{{ $alpName }} = false"
         x-on:close-modal.window="{{ $alpName }} = true"

         class="{{ $classDefault }}">

    {{ $title }}

    <form {{ $attributes }}>

        <div class="grid grid-cols-1 gap-4 mt-4 sm:grid-cols-{{ $grid }}">

            {{ $slot }}

        </div>

    </form>

</section>
