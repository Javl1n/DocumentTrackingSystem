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
    <body class="font-sans antialiased bg-gray-100 dark:bg-gray-900">
        <div class="min-h-screen flex flex-col">
            @include('layouts._navigation')
            <div class="flex flex-grow">
                <aside class="w-1/4 p-7 border-r border-gray-500 flex-shrink-0 text-white">
                    <!-- Settings Dropdown -->
                    {{-- <div class="hidden lg:ml-0 sm:flex sm:items-center sm:ml-6">
                        <x-dropdown align="right" width="full">
                            <x-slot name="trigger">
                                <button class="inline-flex items-center px-3 py-2 border border-transparent font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150 w-full">
                                    <img class="rounded-md" src="https://i.pravatar.cc/60" alt="">
                                    <div class="text-left text-lg flex-1 pl-3" >{{ Auth::user()->name }}</div>
                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <x-dropdown-link :href="route('profile.edit')">
                                    {{ __('Profile') }}
                                </x-dropdown-link>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-dropdown-link :href="route('logout')"
                                            onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div> --}}
                    <ul class="mt-6 text-lg">
                        <li>
                            <a href="#">All Documents</a>
                        </li>
                        <li>
                            <a href="#">My Uploads</a>
                        </li>
                        <li>
                            <a href="">New Document</a>
                        </li>
                    </ul>
                </aside>
                <!-- Page Content -->
                <main class="flex-1 flex flex-col">
                    @if (isset($header))
                        <header class="shadow">
                            <div class="py-6 px-4 sm:px-6 lg:px-8">
                                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
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
