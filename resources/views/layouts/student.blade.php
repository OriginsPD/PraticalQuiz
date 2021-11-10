<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }} Teacher Panel</title>
</head>
<link rel="stylesheet" href="{{ mix('css/app.css') }}">
<link rel="stylesheet" href="{{ asset('css/scroll.css') }}">
<link href="https://kit-pro.fontawesome.com/releases/v5.15.4/css/pro.min.css" rel="stylesheet">
@livewireStyles
<body class="antialiased h-screen bg-gradient-to-b from-blue-800 to-indigo-500 ">

<header class="border-b bg-white border-gray-100">
    <div class="flex items-center justify-between h-16 px-4 mx-auto max-w-screen-2xl sm:px-6 lg:px-8">
        <div class="flex items-center">
            <a href="" class="flex flex-shrink-0">
                <span class="inline-block w-20 h-10 bg-gray-200 rounded-lg"></span>
            </a>


        </div>

        <div class="flex items-center">

            <a href="{{ route('logout') }}" class="inline-flex flex-col items-center justify-center w-16 h-16 bg-gray-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"
                    />
                </svg>

                <span class="block mt-1 text-xs font-medium">Logout</span>
            </a>

            <button
                type="button"
                class="inline-flex flex-col items-center justify-center w-16 h-16 bg-gray-100 border-l border-white lg:hidden"
            >
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
    </div>
</header>


@yield('content')


@livewireScripts
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
<script defer src="https://unpkg.com/@alpinejs/trap@3.x.x/dist/cdn.min.js"></script>
</body>
</html>
