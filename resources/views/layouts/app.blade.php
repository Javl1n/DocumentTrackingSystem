@props(['hasSidebar' => true])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-100 dark:bg-background dark:text-text">
        <div class="min-h-screen flex">
            {{-- @include('layouts._navigation') --}}
            @include('layouts._new_navigation')
            <div class="flex flex-grow h-full">
                @if($hasSidebar)
                    @isset($sidebar)
                        <aside class="w-1/4 p-7 border-gray-600  text-text bg-background-light">
                            <div class="h-[94vh] overflow-y-auto">
                                {{ $sidebar }}
                            </div>
                        </aside> 
                    @endisset   
                @endif

                <!-- Page Content -->
                <main class="flex-1 flex flex-col h-screen overflow-y-auto">
                    @if (isset($header))
                        <header class="shadow">
                            <div class="py-6 px-4 sm:px-6 lg:px-8">
                                <h2 class="font-semibold text-2xl text-gray-800 dark:text-text leading-tight">
                                    {{ $header }}
                                </h2>
                            </div>
                        </header>
                    @endif
                    {{ $slot }}
                </main>
            </div>
        </div>
    </body>
</html>
