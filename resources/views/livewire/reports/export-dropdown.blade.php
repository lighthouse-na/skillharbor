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
        <div class="flex items-center gap-4 p-2 border-b border-slate-200">
            <div class="w-48">
                <button class="bg-blue-500 text-white px-4 py-2 rounded">Export Divisional Report</button>
            </div>
            <div class="flex-1 text-slate-600">
                Export divisional reports with relevant statistics and data.
            </div>
        </div>

    @elseif ($selectedOption === 'departmental')
        <div class="flex items-center gap-4 p-2 border-b border-slate-200">
            <div class="w-48">
                <button class="bg-green-500 text-white px-4 py-2 rounded">Export Departmental Report</button>
            </div>
            <div class="flex-1 text-slate-600">
                Export departmental performance and activity reports.
            </div>
        </div>

    @endif
</div>
