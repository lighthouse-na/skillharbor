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
<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap" rel="stylesheet">

    <!--Favicon-->
    <link rel="shortcut icon" href="{{ asset('assets/logo/mainlogo.png') }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>



    <style>
        [x-cloak] {
            display: none !important;
        }
        .custom-bg {
            background-color: #E0F7FA;
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" viewBox="0 0 200 200" fill="none"><path fill="%23E0F7FA" d="M0 0h200v200H0z"/><path d="M50 50c-10 10-20 20-30 30s-20 20-30 30" stroke="%23B2EBF2" stroke-width="20"/><path d="M150 50c-10 10-50 20-30 30s-20 20-30 30" stroke="%23B2EBF2" stroke-width="20"/><path d="M50 150c-10 10-20 20-30 30s-20 20-30 30" stroke="%23B2EBF2" stroke-width="20"/><path d="M150 150c-10 10-20 20-30 30s-20 20-30 30" stroke="%23B2EBF2" stroke-width="20"/><path d="M0 100c50-50 100-50 150 0s100 50 150 0" stroke="%23B2EBF2" stroke-width="20"/><path d="M0 200c50-50 100-50 150 0s100 50 150 0" stroke="%23B2EBF2" stroke-width="20"/></svg>');
            background-repeat: no-repeat;
            background-size: cover;
        }

    </style>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    @livewireScripts
    @stack('scripts')
</head>
<x-banner />

<body class="font-nunito antialiased bg-gray-100">
    <div class="relative min-h-screen md:flex">
        <main class="flex-1 bg-gray-100 min-h-screen">

            @livewire('navigation-menu')
            <div class="mx-32">
                 <!-- Page Heading -->
                @if (isset($header))
                    <header class="">
                        <div class="font-medium p-3 pt-6 bg-gray-100 text-xl text-slate-800 leading-tight sm:px-6 lg:px-8">
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
<footer class=" py-4 text-center text-white bg-sky-950">
    <p class="text-sm">
        SkillHarbor developed by Lighthouse &copy; {{ date('Y') }}
    </p>
</footer>

</html>
