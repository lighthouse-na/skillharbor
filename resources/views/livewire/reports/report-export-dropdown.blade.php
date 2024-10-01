<div class="relative inline-block text-left" x-data="{ open: @entangle('isOpen') }">
    <div>
        <button @click="open = !open" type="button" class="inline-flex w-full justify-center gap-x-1.5 rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50" aria-expanded="false" aria-haspopup="true">
            Export
            <svg class="-mr-1 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
            </svg>
        </button>
    </div>

    <!-- Dropdown menu -->
    <div x-show="open" @click.away="open = false" class="absolute right-0 z-10 mt-2 w-56 origin-top-right divide-y divide-gray-100 rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none text-center" role="menu" aria-orientation="vertical" tabindex="-1">
        <div class="py-1" role="none">
            <a href="{{ route('reports.employees.export') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-fuchsia-950 hover:text-white font-medium transition duration-300 ease-in-out" role="menuitem" tabindex="-1">
                Export Employees
            </a>
            <a href="{{ route('reports.skills.export') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-fuchsia-950 hover:text-white font-medium transition duration-300 ease-in-out" role="menuitem" tabindex="-1">
                Export Skills
            </a>
        </div>
    </div>
</div>
