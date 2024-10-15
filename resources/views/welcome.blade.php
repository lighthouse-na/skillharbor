<x-guest-layout>
    <div class="absolute top-0 -z-10 h-full w-full bg-white"><div class="absolute bottom-auto left-auto right-0 top-0 h-[500px] w-[500px] -translate-x-[30%] translate-y-[20%] rounded-full bg-[rgba(173,109,244,0.5)] opacity-50 blur-[80px]"></div>
        <header>
            <nav class="container mx-auto p-6 flex justify-between items-center py-4">
                <div class="text-2xl font-bold bg-gradient-to-br from-slate-900 to-fuchsia-600 bg-clip-text text-transparent">Skillharbor.</div>
                <ul class="flex space-x-6">

                    @if (Route::has('login'))
                    <nav class="-mx-3 flex flex-1 justify-end">
                        @auth
                            <a
                                href="{{ url('/dashboard') }}"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                            >
                                Dashboard
                            </a>
                        @else
                            <a
                                href="{{ route('login') }}"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                            >
                                Log in
                            </a>

                            @if (Route::has('register'))
                                <a
                                    href="{{ route('register') }}"
                                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
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
            <div class="relative h-full w-full bg-white"><div class="absolute h-full w-full [background-size:16px_16px] [mask-image:radial-gradient(ellipse_50%_50%_at_50%_50%,#000_70%,transparent_100%)]"></div>
            <div class="container mx-auto text-center p-24">
                <h1 class="text-7xl font-bold text-gray-800">Empower Your Workforce</h1>
                <h1 class="text-7xl font-bold bg-gradient-to-r from-slate-900 to-slate-400 bg-clip-text text-transparent">with Tailored Training Plans</h1>
                <p class="mt-6 text-gray-600">Skillharbor analyzes job descriptions and qualifications to create personalized training plans for every employee.</p>
            </div>
            </div>
        </section>

        <!-- Key Features Section -->
        <section class="p-12">
            <div class="container mx-auto text-center">
                <h2 class="text-3xl font-semibold bg-gradient-to-r from-slate-900 to-fuchsia-600 bg-clip-text text-transparent">Why Choose Skillharbor?</h2>
                <div class="mt-12 grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="border p-8 rounded-lg">
                        <div class="text-fuchsia-600">
                            <x-iconoir-running class="h-12 w-12 mx-auto" />


                        </div>
                        <h3 class="mt-6 text-xl font-semibold">Personalized Training Plans</h3>
                        <p class="mt-4 text-gray-600">Tailor each employee's learning experience based on their job role.</p>
                    </div>

                    <div class="bg-white p-8 rounded-lg border ">
                        <div class="text-fuchsia-600">
                            <x-iconoir-reports  class="h-12 w-12 mx-auto"  />
                        </div>

                        <h3 class="mt-6 text-xl font-semibold">Progress Tracking</h3>
                        <p class="mt-4 text-gray-600">Gain insights into skill development with real-time data analytics.</p>
                    </div>

                    <div class="bg-white p-8 rounded-lg  border">
                        <div class="text-fuchsia-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l4 4 4-4M7 8l4-4 4 4" />
                            </svg>
                        </div>
                        <h3 class="mt-6 text-xl font-semibold">Easy Integration</h3>
                        <p class="mt-4 text-gray-600">Seamlessly integrate with existing HR systems for smooth management.</p>
                    </div>
                </div>
            </div>
        </section>
{{--
        <!-- How It Works Section -->
        <section class="bg-transparent p-12 text-slate-800">
            <div class="container mx-auto text-center">
                <h2 class="text-3xl font-semibold">How Skillharbor Works</h2>
                <div class="mt-12 grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div>
                        <h3 class="text-xl font-semibold">Step 1: Input Job Descriptions</h3>
                        <p class="mt-4 text-gray-600">Upload job descriptions or let Skillharbor analyze them for you.</p>
                    </div>

                    <div>
                        <h3 class="text-xl font-semibold ">Step 2: Assign Training Plans</h3>
                        <p class="mt-4 text-gray-600">Automatically create training plans based on employee skills and roles.</p>
                    </div>

                    <div>
                        <h3 class="text-xl font-semibold ">Step 3: Track Progress</h3>
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
