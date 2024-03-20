<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

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

<body class="font-sans antialiased bg-white">
    <div class="relative min-h-screen md:flex " x-data="{ open: false }">
        <!--Sidebar -->
        <aside :class="{ '-translate-x-full': !open }"
            class="z-10 bg-gradient-to-r from-cyan-800 to-slate-800 lg:fixed sm:fixed text-gray-900 w-56 px-2 py-4  absolute inset-y-0 left-0 top-16 bottom-0 transform md:translate-x-0 overflow-y-auto transition ease-in-out duration-200 shadow-lg">
            <!--logo-->
            <div class="flex items-center justify-between px-2">


                <button type="button" @click="open = !open"
                    class="md:hidden inline-flex p-2 items-center justify-center rounded-md text-black hover:bg-orange-400 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="block w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>


            <!--Nav Links-->
            <nav>
                <x-side-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')" icon="home">
                    Dashboard
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
