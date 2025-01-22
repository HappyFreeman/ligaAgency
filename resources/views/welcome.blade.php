<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased min-h-screen bg-gray-100 dark:bg-gray-900">
        <nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
            <!-- Primary Navigation Menu -->
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <!-- Logo -->
                        <div class="shrink-0 flex items-center">
                            <a href="{{ route('dashboard') }}">
                                <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                            </a>
                        </div>
        
                        <!-- Navigation Links -->
                        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                            @if (Route::has('login'))
                                <nav class="-mx-3 flex flex-1 justify-end">
                                    @auth
                                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                                            {{ __('Dashboard') }}
                                        </x-nav-link>
                                        <x-nav-link :href="route('products.index')" :active="request()->routeIs('products.index')">
                                            {{ __('Products') }}
                                        </x-nav-link>
                                    @else
                                        <x-nav-link :href="route('login')" :active="request()->routeIs('login')">
                                            {{ __('Log in') }}
                                        </x-nav-link>
                                        @if (Route::has('register'))
                                            <x-nav-link :href="route('register')" :active="request()->routeIs('register')">
                                                {{ __('Register') }}
                                            </x-nav-link>
                                        @endif
                                    @endauth
                                </nav>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        {{ __("Тут ничего нет!") }}
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

