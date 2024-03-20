<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">

    <!--Favicon-->
    <link rel="shortcut icon" href="{{ asset('images/logos/telecom_namibia_logo.png') }}">

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    @livewireScripts
    @stack('scripts')
</head>

<body class="font-rubik antialiased bg-white">
    <div class="relative min-h-screen md:flex " x-data="{ open: false }">
        <!--Sidebar -->
        <aside :class="{ '-translate-x-full': !open }"
            class="z-10 bg-gradient-to-br from-fuchsia-950 to-slate-800 lg:fixed sm:fixed text-gray-900 w-56 px-2 py-4  absolute inset-y-0 left-0 top-24 bottom-0 transform md:translate-x-0 overflow-y-auto transition ease-in-out duration-200 shadow-lg">
            <!--logo-->
            <div class="flex items-center justify-between px-2">
                    <!-- Settings Dropdown -->
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">

                            <div class="container mb-6 rounded-lg">
                                <div class="flex justify-between items-center px-3 py-1 cursor-pointer">
                                    <div class="icon">
                                        <img class="h-8 w-8 rounded-lg object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                    </div>
                                    <div class="place-content-center">
                                        <h1 class="text-white pl-3">{{Auth()->user()->name}}</h1>
                                    </div>
                                </div>

                            </div>
                        </x-slot>
                        <x-slot name="content">

                            <x-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <div class="border-t border-gray-200 dark:border-gray-800"></div>
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf
                                <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>

            </div>


            <!--Nav Links-->
            <nav>
                <x-side-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')" icon='iconoir-dashboard-dots'>
                    Dashboard
                </x-side-nav-link>
                <x-side-nav-link href="{{ route('dashboard') }}" :active="false" icon='iconoir-stackoverflow'>

                    My Assessments
                </x-side-nav-link>


            </nav>
        </aside>


        <!-- Page Content -->
        <main class="flex-1 bg-gradient-to-r from-gray-100 to-stone-200 min-h-screen">
            @livewire('navigation-menu')
            <div class="mx-auto ml-44">
                <div class="w-5/6">
                    {{ $slot }}
                </div>
                {{-- {{ $slot }} --}}
            </div>

        </main>
    </div>

</body>
<footer class=" py-4 text-center text-slate-800">
    <p class="text-sm">
        SkillHarbor developed by Lighthouse &copy; {{ date('Y') }}
    </p>
</footer>

</html>
