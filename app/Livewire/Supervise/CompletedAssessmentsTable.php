<?php

namespace App\Livewire\Supervise;

use App\Models\Audit\assessment;
use App\Models\Audit\jcp;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class CompletedAssessmentsTable extends Component
{
    public $assessment_id;
    public function mount($assessment_id)
    {
        $this->assessment_id = $assessment_id;
    }
    //Show assessment filled in by user to be assessed
    public function show($id, $assessment_id)
    {

        $user = User::find(Crypt::decrypt($id));
        $assessment = assessment::find(Crypt::decrypt($assessment_id));
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
            $isAcquired = $userQualifications->contains('qualification_title', $qualification->qualification_title);

            // Add qualification name and attained status to the data array
            $qualificationsData[] = [
                'name' => $qualification->qualification_title,
                'attained' => $isAcquired,
            ];

            // Calculate qualification score
            $qualificationScore += $isAcquired ? 10 : 0;
        }
        // Calculate the maximum possible score
        $maxQualificationScore = $jcp->qualifications()->count() * 10;

        // Calculate the percentage score
        if ($maxQualificationScore > 0) {
            $qualificationPercentage = round(($qualificationScore / $maxQualificationScore) * 100);
        } else {
            $qualificationPercentage = 0; // Or some default value you prefer
        }

        return view('supervise.submission', compact('user', 'jcp', 'qualificationsData', 'qualificationScore', 'qualificationPercentage', 'assessment'));
    }

    public function store(User $user, assessment $assessment, jcp $jcp)
    {

        $data = request()->validate([
            'supervisor_score.*' => 'required', // Add any validation rules as needed
        ]);

        foreach ($data['supervisor_score'] as $skillId => $supervisorRating) {
            // Attach the answer to the assessment-question pivot table
            $jcp->skills()->updateExistingPivot($skillId, ['supervisor_rating' => $supervisorRating]);
        }

        //competency score
        $maxScore = count($data['supervisor_score']) * 5;

        $mean = round((array_sum($data['supervisor_score']) / $maxScore) * 100);

        //Update enroll status
        $user->enrolled()->updateExistingPivot($assessment->id, ['supervisor_status' => 1]);

        $user->update(['competency_rating' => $mean]);

        return redirect()->route('supervise.index')
            ->with('success', 'Answers submitted successfully!');
    }

    public function render()

    {


        $completedAssessments = User::where('supervisor_id', Auth::user()->id)->whereHas('enrolled', function ($query) {
        $query->where('assessment_id', $this->assessment_id)
              ->where('user_status', 1);
    })
    ->with(['enrolled' => function ($query) {
        $query->where('assessment_id', $this->assessment_id);
    }])
    ->select('first_name', 'last_name', 'email', 'id', 'salary_ref_number')
    ->paginate(10);



        return view('livewire.supervise.completed-assessments-table', compact('completedAssessments'));
    }
}
