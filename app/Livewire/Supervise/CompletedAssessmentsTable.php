<?php

namespace App\Livewire\Supervise;

use App\Models\User;
use Livewire\Component;

class CompletedAssessmentsTable extends Component
{

     //Show assessment filled in by user to be assessed
     public function show($id)
     {
         $user = User::find($id);
         $jcp = $user->jcp()
             ->with('skills.category') // Eager load skills and their categories
             ->where('is_active', 1) // Only load jcp where is_active is 1
             ->first();
             $skills = $jcp->skills()->with('category')->get();



             /**
              * Loads Qualification data to assessment
              */
             $userQualifications = $user->qualifications()->get();

             $qualificationsData = [];
             $qualificationScore = 0;

             foreach ($jcp->qualifications()->get() as $qualification) {
                 // Check if the qualification exists in the user's acquired qualifications
                 $isAcquired = $userQualifications->contains('qualification_name', $qualification->qualification_name);

                 // Add qualification name and attained status to the data array
                 $qualificationsData[] = [
                     'name' => $qualification->qualification_name,
                     'attained' => $isAcquired,
                 ];

                 // Calculate qualification score
                 $qualificationScore += $isAcquired ? 10 : 0;
             }
             // Calculate the maximum possible score
             $maxQualificationScore = $jcp->qualifications()->count() * 10;

             // Calculate the percentage score
             $qualificationPercentage = round(($qualificationScore / $maxQualificationScore) * 100);


         return view('supervise.submission', compact('user', 'jcp', 'qualificationsData', 'qualificationScore', 'qualificationPercentage'));
     }


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
