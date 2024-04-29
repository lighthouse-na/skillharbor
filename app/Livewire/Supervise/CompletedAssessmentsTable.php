<?php

namespace App\Livewire\Supervise;

use App\Models\User;
use Livewire\Component;

class CompletedAssessmentsTable extends Component
{



    public function render()
    {
        $completedAssessments = User::whereHas('enrolled', function ($query) {
            $query->where('user_status', 1);
        })->with(['enrolled' => function ($query) {
            $query->select();
        }])->select('first_name', 'last_name', 'email', 'id', 'salary_ref_number')->get();

        $completedAssessments->transform(function ($user) {
            $user->enrolled->transform(function ($enrollment) {
                $enrollment->supervisor_status = $enrollment->supervisor_status ? '1' : '0';
                return $enrollment;
            });
            return $user;
        });



        return view('livewire.supervise.completed-assessments-table', compact('completedAssessments'));
    }
}
