@props([
    'error' => false,
    'option' => false,
    'field' => false,
    'keyType' => false
])

@php

    $classes = 'block w-full px-4 py-2 mt-2 text-gray-700 bg-white border
                   border-gray-300 bg-gray-100 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600
                   focus:outline-none transition duration-300 form-select
                        focus:border-transparent
                          focus:ring-2
                          focus:ring-white
                          focus:ring-offset-2
                          focus:ring-offset-gray-300';

if($error){ $classes .= 'border-red-300'; }

@endphp


<div>

    <select {{ $attributes->merge(['class' => $classes]) }} >

        <option disabled selected> {{ trans('auth.select', ['attribute' => $field]) }} </option>

        @if($option)

            @forelse($option as $key => $label)

                @if($keyType)

                    <option value="{{ $label->$field }}"> {{ $label->$field }} </option>


                @else

                    <option value="{{ $key }}"> {{ $label->$field }} </option>


                @endif

            @empty

                <option>{{ trans('auth.option', ['attribute' => $option]) }}</option>

            @endforelse

        @else

            {{ $slot }}

        @endif

    </select>


    @if($error)

        <span class="text-red-500 text-xs italic  m-1">

            * {{ $error }}

        </span>

    @endif
</div>

