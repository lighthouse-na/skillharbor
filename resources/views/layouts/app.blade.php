<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="!scroll-smooth">

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
    <link rel="shortcut icon" href="{{ asset('assets/logo/logo.png') }}">


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
        <aside :class="{ '-translate-x-full': !open }" class="z-100 bg-gradient-to-br from-fuchsia-950 to-slate-800 lg:fixed sm:fixed text-gray-900 w-56 px-2 py-4  absolute inset-y-0 left-0 top-20 bottom-0 transform md:translate-x-0 overflow-y-auto transition ease-in-out duration-200 shadow-lg">
            <!--logo-->
            <div class="flex items-center mx-auto justify-between px-2" >
                    <!-- Settings Dropdown -->
                    <x-dropdown align="right" width="32">
                        <x-slot name="trigger">

                            <div class="container mb-6 rounded-lg hover:bg-gray-900/50 ">
                                <div class="flex justify-between items-center px-3 py-2 cursor-pointer">
                                    <div class="icon">
                                        <img class="h-8 w-8 rounded-lg object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->first_name }}" />
                                    </div>

                                    <div class="overflow-hidden ">
                                        <h1 class="text-white pl-3 truncate ...">{{Auth()->user()->first_name}} {{Auth()->user()->last_name}}</h1>
                                        <p class="text-white text-xs pl-3 truncate ...">{{Auth()->user()->email}}</p>
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
                <div class="mb-6">
                    <x-side-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')" icon='iconoir-dashboard-dots'>
                        Dashboard
                    </x-side-nav-link>
                    <x-side-nav-link href="{{ route('user-assessment',['user' => Crypt::encrypt(Auth::user()->id)]) }}" :active="request()->routeIs('user-assessment')" icon='iconoir-google-docs'>
                        My Assessments
                    </x-side-nav-link>
                </div>
                <div class="mb-3">
                    <x-side-nav-link href="{{ route('supervise.index') }}" :active="request()->routeIs('supervise.index')" icon='iconoir-user-badge-check'>
                        Supervise
                    </x-side-nav-link>
                    <x-side-nav-link href="{{ route('discover.index') }}" :active="request()->routeIs('discover.index')" icon='iconoir-planet-alt'>
                        Discover
                    </x-side-nav-link>
                    <x-side-nav-link href="{{ route('reports.index') }}" :active="request()->routeIs('reports.index')" icon='iconoir-reports'>
                        Reports
                    </x-side-nav-link>

                </div>






            </nav>
        </aside>




        <!-- Page Content -->
        <main class="flex-1 bg-white min-h-screen">

            @livewire('navigation-menu')
            <div class="px-0 sm:ml-52">
                 <!-- Page Heading -->
                @if (isset($header))
                    <header class="">
                        <div class="font-medium py-6 bg-gray-50 border text-3xl text-gray-800 leading-tight sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endif
                <div class="px-0">
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
