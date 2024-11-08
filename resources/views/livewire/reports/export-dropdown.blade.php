<div class="h-screen flex flex-col p-4">
    <div class="mb-4">
        <label for="export-type" class="block text-sm font-medium text-gray-700">Select Export Type</label>
        <select wire:model.live="selectedOption" id="export-type" class="mt-1 block w-full p-2 border-gray-300 rounded-md shadow-sm focus:ring-sky-500 focus:border-sky-500 sm:text-sm">
            <option value="organizational">Organizational Exports</option>
            <option value="divisional">Divisional Exports</option>
            <option value="departmental">Departmental Exports</option>
        </select>
    </div>

    @if ($selectedOption === 'organizational')
        <div class="flex items-center gap-4 p-2 border-b border-slate-200">
            <div class="w-48">
                @livewire('reports.loading-button-animation', [
                    'label' => 'Export Employees',
                    'route' => 'reports.employees.export'
                ])
            </div>
            <div class="flex-1 text-slate-600">
                Export a detailed report of employee data, including names, roles, and other relevant information.
            </div>
        </div>

        <div class="flex items-center gap-4 p-2 border-b border-slate-200">
            <div class="w-48">
                @livewire('reports.loading-button-animation', [
                    'label' => 'Export Qualifications',
                    'route' => 'reports.qualifications.export'
                ])
            </div>
            <div class="flex-1 text-slate-600">
                Export a detailed report of employee qualification information.
            </div>
        </div>

        <div class="flex items-center gap-4 p-2 border-b border-slate-200">
            <div class="w-48">
                @livewire('reports.loading-button-animation', [
                    'label' => 'Export Skills',
                    'route' => 'reports.skills.export'
                ])
            </div>
            <div class="flex-1 text-slate-600">
                Export a comprehensive report of skills assessments, detailing individual performance and skill levels.
            </div>
        </div>

    @elseif ($selectedOption === 'divisional')
    <div class="space-y-6">
        <details class="rounded-md shadow-md bg-white border border-gray-200">
            <summary class="bg-gray-100 p-4 rounded-t-md cursor-pointer font-semibold">
                CEO's Office
            </summary>
            <div class="flex items-center gap-4 p-2 border-b border-slate-200">
                <div class="w-52">
                    @livewire('reports.loading-button-animation', [
                        'label' => 'Export Employees',
                        'route' => 'reports.employees.export-division',
                        'divisionName' => "CEO's Office"
                    ])
                </div>
                <div class="flex-1 text-slate-600">
                    Export a detailed report of employee qualification information.
                </div>
            </div>
            <div class="flex items-center gap-4 p-2 border-b border-slate-200">
                <div class="w-52">
                    @livewire('reports.loading-button-animation', [
                        'label' => 'Export Qualifications',
                        'route' => 'reports.qualifications.export-division',
                        'divisionName' => "CEO's Office"
                    ])
                </div>
                <div class="flex-1 text-slate-600">
                    Export a detailed report of employee qualification information.
                </div>
            </div>
        </details>
        <details class="rounded-md shadow-md bg-white border border-gray-200">
            <summary class="bg-gray-100 p-4 rounded-t-md cursor-pointer font-semibold">
                Business Division
            </summary>
            <div class="flex items-center gap-4 p-2 border-b border-slate-200">
                <div class="w-52">
                    @livewire('reports.loading-button-animation', [
                        'label' => 'Export Employees',
                        'route' => 'reports.employees.export-division',
                        'divisionName' => "Business Division"
                    ])
                </div>
                <div class="flex-1 text-slate-600">
                    Export a detailed report of employee qualification information.
                </div>
            </div>
            <div class="flex items-center gap-4 p-2 border-b border-slate-200">
                <div class="w-52">
                    @livewire('reports.loading-button-animation', [
                        'label' => 'Export Qualifications',
                        'route' => 'reports.qualifications.export-division',
                        'divisionName' => "Business Division"
                    ])
                </div>
                <div class="flex-1 text-slate-600">
                    Export a detailed report of employee qualification information.
                </div>
            </div>
        </details>
        <details class="rounded-md shadow-md bg-white border border-gray-200">
            <summary class="bg-gray-100 p-4 rounded-t-md cursor-pointer font-semibold">
                Finance Division
            </summary>
            <div class="flex items-center gap-4 p-2 border-b border-slate-200">
                <div class="w-52">
                    @livewire('reports.loading-button-animation', [
                        'label' => 'Export Employees',
                        'route' => 'reports.employees.export-division',
                        'divisionName' => "Finance Division"
                    ])
                </div>
                <div class="flex-1 text-slate-600">
                    Export a detailed report of employee qualification information.
                </div>
            </div>
            <div class="flex items-center gap-4 p-2 border-b border-slate-200">
                <div class="w-52">
                    @livewire('reports.loading-button-animation', [
                        'label' => 'Export Qualifications',
                        'route' => 'reports.qualifications.export-division',
                        'divisionName' => "Finance Division"
                    ])
                </div>
                <div class="flex-1 text-slate-600">
                    Export a detailed report of employee qualification information.
                </div>
            </div>
        </details>
        <details class="rounded-md shadow-md bg-white border border-gray-200">
            <summary class="bg-gray-100 p-4 rounded-t-md cursor-pointer font-semibold">
                Human Resources
            </summary>
            <div class="flex items-center gap-4 p-2 border-b border-slate-200">
                <div class="w-52">
                    @livewire('reports.loading-button-animation', [
                        'label' => 'Export Employees',
                        'route' => 'reports.employees.export-division',
                        'divisionName' => "Human Resources"
                    ])
                </div>
                <div class="flex-1 text-slate-600">
                    Export a detailed report of employee qualification information.
                </div>
            </div>
            <div class="flex items-center gap-4 p-2 border-b border-slate-200">
                <div class="w-52">
                    @livewire('reports.loading-button-animation', [
                        'label' => 'Export Qualifications',
                        'route' => 'reports.qualifications.export-division',
                        'divisionName' => "Human Resources"
                    ])
                </div>
                <div class="flex-1 text-slate-600">
                    Export a detailed report of employee qualification information.
                </div>
            </div>

        </details>
    </div>

    @elseif ($selectedOption === 'departmental')

    <div class="space-y-6">
        <details class="rounded-md shadow-md bg-white border border-gray-200">
            <summary class="bg-gray-100 p-4 rounded-t-md cursor-pointer font-semibold">
                Government
            </summary>
            <div class="bg-white p-4 border-t border-gray-200 text-gray-800">
                Content for Government
            </div>
        </details>
        <details class="rounded-md shadow-md bg-white border border-gray-200">
            <summary class="bg-gray-100 p-4 rounded-t-md cursor-pointer font-semibold">
                Wholesales
            </summary>
            <div class="bg-white p-4 border-t border-gray-200 text-gray-800">
                Content for Wholesales
            </div>
        </details>
        <details class="rounded-md shadow-md bg-white border border-gray-200">
            <summary class="bg-gray-100 p-4 rounded-t-md cursor-pointer font-semibold">
                Field Services General
            </summary>
            <div class="bg-white p-4 border-t border-gray-200 text-gray-800">
                Content for Field Services General
            </div>
        </details>
        <details class="rounded-md shadow-md bg-white border border-gray-200">
            <summary class="bg-gray-100 p-4 rounded-t-md cursor-pointer font-semibold">
                Network Operations
            </summary>
            <div class="bg-white p-4 border-t border-gray-200 text-gray-800">
                Content for Network Operations
            </div>
        </details>
        <details class="rounded-md shadow-md bg-white border border-gray-200">
            <summary class="bg-gray-100 p-4 rounded-t-md cursor-pointer font-semibold">
                Commercial General
            </summary>
            <div class="bg-white p-4 border-t border-gray-200 text-gray-800">
                Content for Commercial General
            </div>
        </details>
        <details class="rounded-md shadow-md bg-white border border-gray-200">
            <summary class="bg-gray-100 p-4 rounded-t-md cursor-pointer font-semibold">
                Legal
            </summary>
            <div class="bg-white p-4 border-t border-gray-200 text-gray-800">
                Content for Legal
            </div>
        </details>
        <details class="rounded-md shadow-md bg-white border border-gray-200">
            <summary class="bg-gray-100 p-4 rounded-t-md cursor-pointer font-semibold">
                Retail & Corporate
            </summary>
            <div class="bg-white p-4 border-t border-gray-200 text-gray-800">
                Content for Retail & Corporate
            </div>
        </details>
    </div>
        
    @endif
</div>
