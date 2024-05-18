<?php

namespace App\Livewire\Reports;

use App\Models\Audit\assessment;
use Livewire\Component;

class SelectReports extends Component
{
    public function render()
    {
        return view('livewire.reports.select-reports',['assessments' => assessment::all()]);
    }
}
