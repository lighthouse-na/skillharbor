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
                                    <a href="#" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-fuchsia-600 dark:text-gray-400 dark:hover:text-white">
                                      <h1 class="mr-1">@svg('iconoir-reports')</h1>
                                     Reports
                                    </a>
                                  </li>
                                  <li>
                                    <div class="flex items-center">
                                      <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                      </svg>
                                      <a href="#" class="ms-1 text-sm font-medium text-gray-700 hover:text-fuchsia-600 md:ms-2 dark:text-gray-400 dark:hover:text-white"> Skills Audit 2024</a>
                                    </div>
                                  </li>
                                  <li aria-current="page">
                                    <div class="flex items-center">
                                      <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                      </svg>
                                      <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Organisational Report</span>
                                    </div>
                                  </li>
                                </ol>
                              </nav>

                        </div>
                    </header>

                <div class="md:flex" x-data="{tab: 0}">
                    <div class="container h-screen w-1/6 border pt-6" >
                        <ul class="flex-column text-sm font-normal text-gray-500 dark:text-gray-400 md:me-4 mb-4 md:mb-0">
                            <li class="inline-flex items-center">

                                <h1 class="px-6 py-0.5 uppercase font-medium text-xs text-gray-900 pb-2"> Organisation</h1>

                              </li>
                            <li>
                                <button  x-on:click.prevent="tab = 0" class="inline-flex items-center px-6 py-1 my-0.5  rounded-r-lg bg-gray-100 text-gray-900 active w-full dark:bg-fuchsia-600" aria-current="page">

                                    Organisational Report
                                </button>
                            </li>
                            <li>
                                <button  x-on:click.prevent="tab = 1" class="inline-flex items-center px-6 py-1 my-0.5 rounded-r-lg hover:bg-gray-100  w-full dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-white">
                                    Departmental Report
                                </button>
                            </li>
                            <li>
                                <button  x-on:click.prevent="tab = 2"  class="inline-flex items-center  px-6 py-1 my-0.5 rounded-r-lg hover:bg-gray-100  w-full dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-white">

                                    Individual Report
                                </button>
                            </li>
                            <li>
                                <button  x-on:click.prevent="tab = 3"  class="inline-flex items-center px-6 py-1 my-0.5  rounded-r-lg hover:bg-gray-100 w-full dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-white">

                                    My Report
                                </button>
                            </li>

                        </ul>
                    </div>

                    <div class="p-6 bg-gray-50 border-t text-medium text-gray-500 dark:text-gray-400 dark:bg-gray-800  w-full" x-show="tab === 0">
                        <div class="flex justify-between mb-1">
                            <span class="text-base font-medium text-fuchsia-700 dark:text-white">{{$assessmentProgress["completed"]}}/{{$assessmentProgress["total"]}}</span>
                            <span class="text-sm font-medium text-fuchsia-700 dark:text-white">{{$assessmentProgress["percentage"]}}%</span>
                          </div>
                          <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                            <div class="bg-fuchsia-600 h-2.5 rounded-full" style="width: {{$assessmentProgress["percentage"]}}%"></div>
                          </div>
                        <div class="relative w-full">
                            <div class="border bg-white rounded-md p-3 w-auto inline-flex items-center absolute top-3 right-3">
                                <a href="#" class="inline-flex ">
                                    <x-iconoir-shield-download />
                                    <h1>Download Report</h1>
                                </a>
                            </div>
                        </div>

                        <div class="mt-6">
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Report for {{$assessment->assessment_title}}</h3>
                            <div>
                                <canvas id="genderChart"></canvas>
                              </div>
                        </div>

                    </div>
                    <div class="flex" x-show="tab === 1">
                        Dep

                    </div>
                </div>


                </div>

            </div>
        </div>

    </div>


</x-app-layout>
