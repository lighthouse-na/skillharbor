<?php

namespace App\Livewire\Discover;

use App\Models\Audit\assessment;
use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        return view('livewire.discover.home', ['assessments' => assessment::all()]);
    }
}
