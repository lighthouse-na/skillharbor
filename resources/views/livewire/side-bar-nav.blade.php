<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <div class="relative min-h-screen md:flex " x-data="{ open: false }">
        <!--Sidebar -->
        <aside :class="{ '-translate-x-full': !open }"
            class="z-0 bg-gradient-to-r from-sky-700 to-cyan-600 lg:fixed sm:fixed text-white w-52 px-2 py-4  absolute inset-y-0 left-0 top-12 transform md:translate-x-0 overflow-y-auto transition ease-in-out duration-200 shadow-sm">


            <!--Nav Links-->
            <nav>
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>

                {{-- <x-side-nav-link href="{{ route('my-assessments') }}" :active="request()->routeIs('my-assessments')" icon="clipboard-list">
                    My Assessments
                </x-side-nav-link> --}}




                {{-- @if (Auth::user()->role == 'Admin')
                    <div class="inline-flex justify-start items-center w-full">
                        <span class="absolute px-3 font-medium text-gray-900 bg-white">Skills
                            Audit</span>
                        <hr class="my-3 w-64 h-px bg-gray-200 border-0 ">
                    </div>
                    <x-side-nav-link href="{{ route('organisation') }}" :active="request()->routeIs('organisation')" icon="sitemap">
                        Organisation
                    </x-side-nav-link>

                    <x-side-nav-link href="{{ route('assess.staff') }}" :active="request()->routeIs('assess.staff')" icon="arrows-to-eye">
                        Assess Staff
                    </x-side-nav-link>

                    <x-side-nav-link href="{{ route('ecp.index') }}" :active="request()->routeIs('ecp.index')" icon="address-card">
                        Competency Profiles
                    </x-side-nav-link>

                    <x-side-nav-link href="{{ route('reports.org') }}" :active="request()->routeIs('reports.org')" icon="clipboard-list">
                        Reports
                    </x-side-nav-link>

                    <div class="inline-flex justify-start items-center w-full">
                        <span class="absolute px-3 font-medium text-gray-900 bg-white ">System</span>
                        <hr class="my-3 w-64 h-px bg-gray-200 border-0">

                    </div>

                    <x-side-nav-link href="{{ route('jcp.index') }}" :active="request()->routeIs('jcp.index')" icon="user-doctor">
                        JCP Management
                    </x-side-nav-link>

                    <x-side-nav-link href="{{ route('skill.index') }}" :active="request()->routeIs('skill.index')" icon="list-alt">
                        Skills Management
                    </x-side-nav-link>

                    <x-side-nav-link href="{{ route('qualification.index') }}" :active="request()->routeIs('qualification.index')" icon="file-alt">
                        Qualification Management
                    </x-side-nav-link>

                    <x-side-nav-link href="{{ route('category') }}" :active="request()->routeIs('category')" icon="list-alt">
                        Category Management
                    </x-side-nav-link>
                @endif
                @if (Auth::user()->role == 'Supervisor' or Auth::user()->role == 'Manager')
                    <x-side-nav-link href="{{ route('organisation') }}" :active="request()->routeIs('organisation')" icon="clipboard-list">
                        Organisation
                    </x-side-nav-link>

                    <x-side-nav-link href="{{ route('submissions') }}" :active="request()->routeIs('submissions')" icon="clipboard-list">
                        Assess Staff
                    </x-side-nav-link>

                    <x-side-nav-link href="{{ route('ecp.index') }}" :active="request()->routeIs('ecp.index')" icon="clipboard-list">
                        Competency Profiles
                    </x-side-nav-link>

                    <x-side-nav-link href="{{ route('reports.org') }}" :active="request()->routeIs('reports.org')" icon="clipboard-list">
                        Reports
                    </x-side-nav-link>
                @endif --}}
            </nav>
        </aside>



    </div>
</div>
