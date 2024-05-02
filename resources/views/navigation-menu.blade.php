<div class="bg-white sticky shadow-md top-0 dark:bg-gray-800  dark:border-gray-700 relative z-10 ">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="text-black dark:text-gray-200">
                        <div class="flex flex-row items-center justify-center">
                            <div><img src="{{asset('assets/logo/logo.png')}}" alt="" class="rounded-full w-12 mr-2 hover:shadow-md"></div>
                            <div>
                                <h1 class="block text-3xl w-auto">skillHarbor</h1>
                            </div>
                        </div>

                    </a>
                </div>
                <!-- Navigation Links -->

            </div>
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <!-- Settings Dropdown -->
                <div class="ms-3 mx-auto absolute right-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">

                            <span class="inline-flex rounded-md">
                                <button type="button" class="inline-flex !text-md items-center px-3 py-3 border text-sm leading-4 font-medium rounded-md text-gray-900 dark:text-gray-400 bg-white dark:bg-gray-800 hover:bg-gray-50 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none focus:bg-gray-50 dark:focus:bg-gray-700 active:bg-gray-50 dark:active:bg-gray-700 transition ease-in-out duration-150">
                                    DIRECTORIES
                                    <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.5l-7.5 7.5-7.5-7.5" />
                                    </svg>
                                </button>
                            </span>
                        </x-slot>
                        <x-slot name="content">
                            <!-- Directory Management -->
                            <x-dropdown-link href="{{route('assessments.index')}}">
                                Assessments
                            </x-dropdown-link>
                            <x-dropdown-link href="{{route('jcp.index')}}">
                                JCPs
                            </x-dropdown-link>
                            <x-dropdown-link href="{{route('skills.index')}}">
                                Skills
                            </x-dropdown-link>
                            <x-dropdown-link href="{{route('qualifications.index')}}">
                                Qualifications
                            </x-dropdown-link>
                            <x-dropdown-link href="{{route('org.index')}}">
                                Organisation
                            </x-dropdown-link>

                            {{-- <div class="border-t border-gray-200 dark:border-gray-800"></div> --}}

                        </x-slot>
                    </x-dropdown>

                </div>

            </div>
            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            {{-- <!-- Responsive Navigation Menu -->
            <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
                <div class="pt-2 pb-3 space-y-1">
                    <x-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')" class="text-gray-800 dark:text-gray-200 hover:text-gray-900 dark:hover:text-gray-100">
                        {{ __('Dashboard') }}
                    </x-responsive-nav-link>
                </div>
                <!-- Responsive Settings Options -->
                <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
                    <div class="flex items-center px-4">
                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <div class="shrink-0 me-3">
                            <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                        </div>
                        @endif
                        <div>
                            <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                            <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                        </div>
                    </div>
                    <div class="mt-3 space-y-1">
                        <!-- Account Management -->
                        <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')" class="block text-gray-800 dark:text-gray-200 hover:text-gray-900 dark:hover:text-gray-100">
                            {{ __('Profile') }}
                        </x-responsive-nav-link>
                        @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                        <x-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')" class="block text-gray-800 dark:text-gray-200 hover:text-gray-900 dark:hover:text-gray-100">
                            {{ __('API Tokens') }}
                        </x-responsive-nav-link>
                        @endif
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf
                            <x-responsive-nav-link href="{{ route('logout') }}" @click.prevent="$root.submit();" class="block text-gray-800 dark:text-gray-200 hover:text-gray-900 dark:hover:text-gray-100">
                                {{ __('Log Out') }}
                            </x-responsive-nav-link>
                        </form>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</div>
