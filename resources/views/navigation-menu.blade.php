<div class="bg-gray-100 sticky top-0  dark:bg-gray-800  dark:border-gray-700 relative z-10 ">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="text-black dark:text-gray-200">
                        <div class="flex flex-row items-center justify-center">

                            <div>
                                <h1 class="block text-3xl w-auto">SkillHarbor</h1>
                            </div>
                        </div>

                    </a>
                </div>
                <!-- Navigation Links -->

            </div>
            <div class="hidden sm:flex sm:items-center sm:ms-6  px-2 ">
                <!-- Settings Dropdown -->
                <div class="-ms-3 mx-auto absolute right-3 top-3">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">

                            <div class="container mb-6 rounded-lg">
                                <div class="flex justify-between items-center px-3 py-2 cursor-pointer">
                                    <div class="icon">
                                        <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->first_name }}" />
                                    </div>

                                    <div class="overflow-hidden ">
                                        <h1 class="text-slate-800 pl-3 truncate ...">{{Auth()->user()->first_name}} {{Auth()->user()->last_name}}</h1>
                                        <p class="text-black text-xs pl-3 truncate ...">{{Auth()->user()->email}}</p>
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
                                <x-dropdown-link href="{{ route('logout') }}"  class="text-red-500 hover:bg-red-100" @click.prevent="$root.submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>



                </div>
                <div class="hidden sm:flex sm:items-center sm:ms-6 items-center mx-auto justify-between bg-sky-50 w-full rounded-xl p-2">
                    <x-side-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')" >
                        Dashboard
                    </x-side-nav-link>
                    <x-side-nav-link href="{{ route('user.assessment',['user' => Crypt::encrypt(Auth::user()->id)]) }}" :active="request()->routeIs('user.assessment')">
                        My Assessments
                    </x-side-nav-link>
                    @if (Auth::user()->role === "supervisor" |  Auth::user()->role === "admin")
                    <x-side-nav-link href="{{ route('supervise.index') }}" :active="request()->routeIs('supervise.index')">
                        Supervise
                    </x-side-nav-link>
                    @endif

                    {{-- <x-side-nav-link href="{{ route('discover.index') }}" :active="request()->routeIs('discover.index')" >
                        Discover
                    </x-side-nav-link> --}}
                    <x-side-nav-link href="{{ route('reports.index') }}" :active="request()->routeIs('reports.index')" >
                        Reports
                    </x-side-nav-link>
                    @if (Auth::user()->role === "supervisor" |  Auth::user()->role === "admin")

                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">

                            <span class="inline-flex rounded-xl mx-auto">
                                <button type="button" class="inline-flex flex items-center align-center px-2 py-2 m-1   text-sm rounded-xl text-white dark:text-gray-400 bg-slate-800 dark:bg-gray-800  active:bg-gray-800 dark:active:bg-gray-700 transition ease-in-out duration-150">
                                    Directories
                                </button>
                            </span>
                        </x-slot>
                        <x-slot name="content">
                            <!-- Directory Management -->
                            @if (Auth::user()->role === "admin")
                            <x-dropdown-link href="{{route('assessments.index')}}">
                                Assessments
                            </x-dropdown-link>
                            @endif

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
                    @endif
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
