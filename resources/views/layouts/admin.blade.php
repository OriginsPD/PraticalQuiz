<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }} Admin Panel</title>
</head>
<link rel="stylesheet" href="{{ mix('css/app.css') }}">
<link rel="stylesheet" href="{{ asset('css/scroll.css') }}">
<link href="https://kit-pro.fontawesome.com/releases/v5.15.4/css/pro.min.css" rel="stylesheet">
@livewireStyles
<body class="antialiased bg-gradient-to-b from-gray-500 to-gray-600 ">


<div>

    <div x-data="{ sidebarOpen: false }" class="flex h-screen bg-gray-200">

        <div :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false"
             class="fixed z-20 inset-0 bg-black opacity-50 transition-opacity hidden"></div>
        @livewire('navigation.admin-sidebar')

        <div class="flex-1 flex flex-col overflow-hidden">
            @livewire('navigation.admin-header')


            @yield('content')
        </div>
    </div>
</div>


@livewireScripts
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
<script defer src="https://unpkg.com/@alpinejs/trap@3.x.x/dist/cdn.min.js"></script>
</body>
</html>
