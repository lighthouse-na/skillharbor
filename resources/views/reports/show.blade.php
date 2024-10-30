<x-app-layout>
    <x-slot name="header">
        <h2 class="">
            {{ __('Reports') }}
        </h2>
    </x-slot>

    <div class="ml-4">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-md rounded-3xl border">
            <div>
                <header class="">
                    <div class="font-medium py-6 bg-sky-950 text-3xl text-white leading-tight sm:px-6 lg:px-8">
                        <nav class="flex" aria-label="Breadcrumb">
                            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                                <li class="inline-flex items-center">
                                    <a href="#" class="inline-flex items-center text-sm font-medium text-white hover:text-sky-200 dark:text-gray-400 dark:hover:text-sky-600">
                                        <h1 class="mr-1">@svg('iconoir-reports')</h1>
                                        Reports
                                    </a>
                                </li>
                                <li>
                                    <div class="flex items-center">
                                        <svg class="rtl:rotate-180 w-3 h-3 text-white mx-1" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                                        </svg>
                                        <a href="#" class="ms-1 text-sm font-medium text-white hover:text-sky-200 md:ms-2 dark:text-gray-400 dark:hover:text-sky-600">
                                            Skills Audit 2024
                                        </a>
                                    </div>
                                </li>
                                <li aria-current="page">
                                    <div class="flex items-center">
                                        <svg class="rtl:rotate-180 w-3 h-3 text-white mx-1" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                                        </svg>
                                        <span class="ms-1 text-sm font-medium text-white md:ms-2 dark:text-gray-400">
                                            Organisational Report
                                        </span>
                                    </div>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </header>

                <div class="p-6 bg-gray-50 border-t text-medium text-gray-500 dark:text-gray-400 dark:bg-gray-800 w-full">
                    <div class="mt-6 h-full">
                        <h3 class="text-lg font-base text-gray-900 dark:text-white mb-2">
                            Report for {{$assessment->assessment_title}}
                        </h3>
                        <div class="container p-4 overflow-auto"></div>
                    </div>
                    <div class="flex justify-between mb-1">
                        <span class="text-base font-medium text-sky-700 dark:text-white">
                            {{$assessmentProgress["completed"]}}/{{$assessmentProgress["total"]}}
                        </span>
                        <span class="text-sm font-medium text-sky-700 dark:text-white">
                            {{$assessmentProgress["percentage"]}}%
                        </span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                        <div class="bg-sky-600 h-2.5 rounded-full" style="width: {{$assessmentProgress["percentage"]}}%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="h-screen flex flex-col p-4">
        @livewire('export-dropdown')
    </div>

</x-app-layout>

<script>
    document.addEventListener('livewire:load', function () {
        Livewire.on('redirect', function (url) {
            window.location.href = url;
        });
    });
</script>
