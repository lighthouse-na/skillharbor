<?php

namespace App\Livewire\Reports;

use App\Models\Audit\assessment;
use Livewire\Component;

class SystemReports extends Component
{


    public function show($id){
        $assessment = assessment::find($id);
        return view('reports.show', compact('assessment'));
    }


}
