<x-app-layout>

    <x-slot name="header">
        <h2 class=" ">
            {{ __('Reports') }}
        </h2>
    </x-slot>
    <div class="">
        <div class="ml-4">
            <div class="bg-white dark:bg-gray-800 overflow-hidden">
                <div>
                    <header class="">
                        <div class="font-medium py-6 bg-white text-3xl text-gray-500 leading-tight sm:px-6 lg:px-8">
                            <nav class="flex" aria-label="Breadcrumb">
                                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                                    <li class="inline-flex items-center">
                                        <a href="#"
                                            class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-fuchsia-600 dark:text-gray-400 dark:hover:text-fuchsia-600">
                                            <h1 class="mr-1">@svg('iconoir-reports')</h1>
                                            Reports
                                        </a>
                                    </li>
                                    <li>
                                        <div class="flex items-center">
                                            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                                            </svg>
                                            <a href="#"
                                                class="ms-1 text-sm font-medium text-gray-700 hover:text-fuchsia-600 md:ms-2 dark:text-gray-400 dark:hover:text-fuchsia-600">
                                                Skills Audit 2024</a>
                                        </div>
                                    </li>
                                    <li aria-current="page">
                                        <div class="flex items-center">
                                            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                                            </svg>
                                            <span
                                                class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Organisational
                                                Report</span>
                                        </div>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </header>

                    <div class="p-6 bg-gray-50 border-t text-medium text-gray-500 dark:text-gray-400 dark:bg-gray-800  w-full">
                        <div class="mt-6 h-full">
                            <h3 class="text-lg font-base text-gray-900 dark:text-white mb-2">Report for
                                {{$assessment->assessment_title}}</h3>

                            <div class="container p-4 overflow-auto">
                            </div>
                        </div>

                        <div class="flex justify-between mb-1">
                            <span
                                class="text-base font-medium text-fuchsia-700 dark:text-white">{{$assessmentProgress["completed"]}}/{{$assessmentProgress["total"]}}</span>
                            <span
                                class="text-sm font-medium text-fuchsia-700 dark:text-white">{{$assessmentProgress["percentage"]}}%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                            <div class="bg-fuchsia-600 h-2.5 rounded-full"
                                style="width: {{$assessmentProgress["percentage"]}}%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="h-screen flex flex-col p-4">
        <div class="flex items-center gap-4 p-2 border-b border-slate-200">
            <a href="{{ route('reports.employees.export') }}" class="text-initial flex-none w-52">
                <div
                    role="button"
                    class="text-slate-800 flex items-center rounded-md p-3 transition-all hover:text-black hover:bg-fuchsia-200 hover:font-medium focus:bg-slate-100 active:bg-slate-100"
                >
                    Export Employees
                </div>
            </a>
            <div class="flex-1 text-slate-600">
                Export a detailed report of employee data, including names, roles, and other relevant information.
            </div>
        </div>

        <div class="flex items-center gap-4 p-2 border-b border-slate-200">
            <a href="{{ route('reports.qualifications.export') }}" class="text-initial flex-none w-52">
                <div
                    role="button"
                    class="text-slate-800 flex items-center rounded-md p-3 transition-all hover:text-black hover:bg-fuchsia-200 hover:font-medium focus:bg-slate-100 active:bg-slate-100"
                >
                    Export Qualifications
                </div>
            </a>
            <div class="flex-1 text-slate-600">
                Export a detailed report of employee qualification information.
            </div>
        </div>

        <div class="flex items-center gap-4 p-2 border-b border-slate-200">
            <a href="{{ route('reports.skills.export') }}" class="text-initial flex-none w-52">
                <div
                    role="button"
                    class="text-slate-800 flex items-center rounded-md p-3 transition-all hover:text-black hover:bg-fuchsia-200 hover:font-medium focus:bg-slate-100 active:bg-slate-100"
                >
                    Export Skills
                </div>
            </a>
            <div class="flex-1 text-slate-600">
                Export a comprehensive report of skills assessments, detailing individual performance and skill levels.
            </div>
        </div>
    </div>

</x-app-layout>
