<?php

namespace App\Livewire\Supervise;

use App\Models\Audit\assessment;
use Livewire\Component;

class SelectAssessment extends Component
{
    public function render()
    {
        return view('livewire.supervise.select-assessment', ['assessments' => assessment::all()]);
    }
}
