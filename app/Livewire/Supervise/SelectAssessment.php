<?php

namespace App\Livewire\Supervise;

use Livewire\Component;
use App\Models\Audit\assessment;
class SelectAssessment extends Component
{
    public function render()
    {
        return view('livewire.supervise.select-assessment',['assessments' => assessment::all()]);
    }
}
