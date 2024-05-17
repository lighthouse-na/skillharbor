<?php

namespace App\Livewire\Reports;

use App\Models\Audit\assessment;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class SystemReports extends Component
{


    public function show($id){
        $assessment = assessment::find(Crypt::decrypt($id));
        return view('reports.show', compact('assessment'));
    }


}
