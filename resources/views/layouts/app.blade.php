<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="!scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SkillHarbor') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">

    <!--Favicon-->
    <link rel="shortcut icon" href="{{ asset('assets/logo/mainlogo.png') }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>



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





        <!-- Page Content -->
        <main class="flex-1 bg-gray-50 min-h-screen">

            @livewire('navigation-menu')
            <div class=" mx-32">
                 <!-- Page Heading -->
                @if (isset($header))
                    <header class="">
                        <div class="font-medium p-3 pt-6 bg-gray-50 text-xl text-slate-800 leading-tight sm:px-6 lg:px-8">
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
<footer class=" py-4 text-center text-slate-500 bg-gray-50">
    <p class="text-sm">
        SkillHarbor developed by Lighthouse &copy; {{ date('Y') }}
    </p>
</footer>

</html>
