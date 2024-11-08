<?php

namespace App\Livewire;

use Livewire\Component;

class ExportDropdown extends Component
{
    public $selectedOption = 'organizational';

    public function render()
    {
       
        return view('livewire.reports.export-dropdown');
    }

}
