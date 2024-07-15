<?php

namespace App\Livewire\Reports;

use App\Models\Audit\assessment;
use Livewire\Component;
use App\Models\Audit\Division;

class SelectReports extends Component
{
    public function render()
    {
        return view('livewire.reports.select-reports',['assessments' => assessment::all()]);
    }
}
