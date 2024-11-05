<?php

namespace App\Livewire\Reports;

use App\Models\Audit\assessment;
use Livewire\Component;

class SelectReports extends Component
{


    public function render()
    {
        $assessments = Assessment::all();

        // Calculate total enrolled users and completed assessments for each assessment
        foreach ($assessments as $assessment) {
            $assessment->totalEnrolled = $assessment->enrolled()->count();
            $assessment->completedCount = $assessment->enrolled()
                ->wherePivot('user_status', 1)
                ->wherePivot('supervisor_status', 1)
                ->count();
        }

        return view('livewire.reports.select-reports', [
            'assessments' => $assessments
        ]);
    }
}
