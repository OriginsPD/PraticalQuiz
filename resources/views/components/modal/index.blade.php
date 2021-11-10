
<div x-transition
    {{ $attributes->merge(['class' => 'fixed h-screen flex items-center justify-center top-0 left-0 bottom-0 z-50 w-screen bg-gray-800 bg-opacity-75']) }}>

    {{ $slot }}

</div>
