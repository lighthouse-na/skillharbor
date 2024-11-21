<x-guest-layout>
    <div class="absolute top-0 -z-10 h-full w-full bg-white"><div class="absolute bottom-auto left-auto right-0 top-0 h-[500px] w-[500px] -translate-x-[30%] translate-y-[20%] rounded-full bg-[rgba(14,165,233,0.6)] opacity-50 blur-[80px]"></div>
        <header class="sticky top-0 z-10 bg-white">
            <nav class="container mx-auto p-6 flex justify-between items-center py-3">
                <div class="px-12 w-64">
                    <img src="{{asset('assets/images/Application_Logo (2).png')}}" />
                </div>
                <ul class="flex space-x-6">

                    @if (Route::has('login'))
                    <nav class="-mx-3 flex flex-1 justify-end">
                        @auth
                            <a
                                href="{{ url('/dashboard') }}"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-sky-700/70 focus:outline-none focus-visible:ring-[#FF2D20]"
                            >
                                Dashboard
                            </a>
                        @else
                            <a
                                href="{{ route('login') }}"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-sky-700/70 focus:outline-none focus-visible:ring-[#FF2D20]"
                            >
                                Log in
                            </a>

                            @if (Route::has('register'))
                                <a
                                    href="{{ route('register') }}"
                                    class="rounded-md border border-slate-300 py-2 px-4 text-center text-sm transition-all shadow-sm hover:shadow-lg text-sky-700 hover:text-white hover:bg-sky-700 hover:border-sky-700 focus:text-white focus:bg-sky-700 focus:border-sky-700 active:border-sky-700 active:text-white active:bg-sky-700 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="button"
                                >
                                    Register
                                </a>
                            @endif
                        @endauth
                    </nav>
                @endif
                </ul>
            </nav>
        </header>

        <!-- Hero Section -->
        <section class="p-16">

            <div class="container mx-auto text-center p-24">
                <h1 class="text-7xl font-light text-gray-800">Empower Your Workforce</h1>
                <h1 class="text-7xl font-light pb-3 bg-gradient-to-r from-slate-900 to-sky-900 bg-clip-text text-transparent">with Tailored Training Plans</h1>
                <p class="mt-6 text-gray-600">Skillharbor analyzes job descriptions and qualifications to create personalized training plans for every employee.</p>

            </div>
        </section>

        <!-- Key Features Section -->
        <section class="p-12 px-64">
            <div class="container mx-auto text-center">
                <h2 class="text-3xl font-light bg-gradient-to-r from-slate-900 to-sky-600 bg-clip-text text-transparent">Why Choose Skillharbor?</h2>
                <div class="mt-12 grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="border p-8 rounded-3xl shadow-xl bg-white">
                        <div class="flex justify-center align-center">
                            <div class="flex text-sky-800 rounded-full bg-sky-200 h-12 w-12 justify-items-center items-center">
                                <x-iconoir-running class="h-6 w-6 mx-auto " />


                            </div>
                        </div>

                        <h3 class="mt-6 text-xl text-gray-400">Personalized Training Plans</h3>
                        <p class="mt-4 text-gray-600">Tailor each employee's learning experience based on their job role.</p>
                    </div>

                    <div class="bg-white p-8 rounded-3xl border shadow-xl bg-white">
                        <div class="flex justify-center align-center">
                            <div class="flex text-sky-800 rounded-full bg-sky-200 h-12 w-12 justify-items-center items-center">
                                <x-iconoir-flash class="h-6 w-6 mx-auto"  />
                        </div>
                        </div>

                        <h3 class="mt-6 text-xl text-gray-400">Progress Tracking</h3>
                        <p class="mt-4 text-gray-600">Gain insights into skill development with real-time data analytics.</p>
                    </div>

                    <div class="bg-white p-8 rounded-3xl  border shadow-xl bg-white">
                        <div class="flex justify-center align-center">
                            <div class="flex text-sky-800 rounded-full bg-sky-200 h-12 w-12 justify-items-center items-center">
                                <x-iconoir-bright-star class="h-6 w-6 mx-auto"/>
                        </div>
                        </div>
                        <h3 class="mt-6 text-xl text-gray-400">Adaptive Learning Paths</h3>
                        <p class="mt-4 text-gray-600">Empower employees with personalized learning paths that adjust dynamically based on their performance and progress.</p>
                    </div>
                </div>
            </div>
        </section>
{{--
        <!-- How It Works Section -->
        <section class="bg-transparent p-12 text-slate-800">
            <div class="container mx-auto text-center">
                <h2 class="text-3xl font-light">How Skillharbor Works</h2>
                <div class="mt-12 grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div>
                        <h3 class="text-xl font-light">Step 1: Input Job Descriptions</h3>
                        <p class="mt-4 text-gray-600">Upload job descriptions or let Skillharbor analyze them for you.</p>
                    </div>

                    <div>
                        <h3 class="text-xl font-light ">Step 2: Assign Training Plans</h3>
                        <p class="mt-4 text-gray-600">Automatically create training plans based on employee skills and roles.</p>
                    </div>

                    <div>
                        <h3 class="text-xl font-light ">Step 3: Track Progress</h3>
                        <p class="mt-4 text-gray-600">Monitor progress and adjust training plans in real-time.</p>
                    </div>
                </div>
            </div>
        </section> --}}

        <!-- Footer Section -->
        <footer class="text-slate-800 bg-gray-50/50 py-8">
            <div class="container mx-auto text-center">
                <p>&copy; 2024 Skillharbor. All Rights Reserved.</p>
                <div class="mt-4">
                    <a href="#" class="text-gray-400 hover:text-gray-200 mx-2">Privacy Policy</a>
                    <a href="#" class="text-gray-400 hover:text-gray-200 mx-2">Terms of Service</a>
                </div>
            </div>
        </footer>
    </div>

</x-guest-layout>
