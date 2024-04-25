<?php

namespace App\Livewire\Supervise;

use App\Models\User;
use Livewire\Component;

class CompletedAssessmentsTable extends Component
{


    public function render()
    {
        $users = User::whereHas('enrolled', function ($query) {
            $query->where('user_status', 1);
        })->get();

        return view('livewire.supervise.completed-assessments-table', compact('users'));
    }
}
