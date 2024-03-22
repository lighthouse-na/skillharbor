<x-app-layout>
    <x-slot name="header">
        <h2 class="">
            {{ __('Your Assessments') }}
        </h2>
    </x-slot>
    <div class="py-6 px-6">
        <div class="">

        <div class="grid grid-cols-3 gap-4 rounded-lg mb-4 p-4 sm:p-6 h-full dark:bg-gray-800">
            @foreach (range(0, 3) as $item)
            <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-slate-900 dark:border-gray-700 dark:shadow-slate-700/[.7]">
                <div class="bg-gray-100 border-b rounded-t-xl py-3 px-4 md:py-4 md:px-5 dark:bg-slate-900 dark:border-gray-700">
                  <p class="mt-1 text-sm text-gray-500 dark:text-gray-500">
                    Telecom Skills Audit Assessment for 2024
                  </p>
                </div>
                <div class="p-4 md:p-5">
                  <h3 class="text-lg font-bold text-gray-800 dark:text-white">
                    Card title
                  </h3>
                  <p class="mt-2 text-gray-500 dark:text-gray-400">
                    With supporting text below as a natural lead-in to additional content.
                  </p>
                  <a class="mt-3 inline-flex items-center gap-x-1 text-sm font-semibold rounded-lg border border-transparent text-fuchsia-600 hover:text-fuchsia-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" href="#">
                    Get Started
                    <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
                  </a>
                </div>
            </div>

            @endforeach


        </div>

    </div>


</x-app-layout>
