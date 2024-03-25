<div class="bg-white sticky top-0 dark:bg-gray-800  dark:border-gray-700 ">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="<?php echo e(route('dashboard')); ?>" class="text-black dark:text-gray-200">
                        <h1 class="block text-3xl w-auto">skillHarbor</h1>
                    </a>
                </div>
                <!-- Navigation Links -->

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

            
        </div>
    </div>
</div>
<?php /**PATH /home/hubert/Desktop/lighthouse/projects/skillharbor-open/resources/views/navigation-menu.blade.php ENDPATH**/ ?>