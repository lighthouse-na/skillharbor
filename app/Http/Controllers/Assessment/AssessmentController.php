<?php

namespace App\Http\Controllers\Assessment;

use App\Http\Controllers\Controller;
use App\Models\Audit\assessment;
use App\Models\Audit\jcp;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class AssessmentController extends Controller
{
    //
    public function index($u)
    {
        $id = decrypt($u);
        $user = User::find($id);

        $assessments = $user
            ->assessments()
            ->withPivot('user_status', 'supervisor_status') // Include user_status and supervisor_status from enrolled table
            ->get();


        return view('assessments.index', compact('assessments', 'user'));
    }

    public function show($user, $assessment)
    {
        $user = User::find(decrypt($user));
        $assessment = assessment::find(decrypt($assessment));
        $jcp = $user->jcp()
            ->with('skills.category') // Eager load skills and their categories
            ->where('assessment_id', $assessment->id)
            ->where('is_active', 1) // Only load jcp where is_active is 1
            ->first();

        return view('assessments.show', compact('jcp', 'user', 'assessment'));
    }

    public function storeEmployee(User $user, assessment $assessment, jcp $jcp)
    {
        $data = request()->validate([
            'questions.*' => 'required', // Add any validation rules as needed
        ]);
        foreach ($data['questions'] as $skillId => $userRating) {
            // Attach the answer to the assessment-question pivot table
            $jcp->skills()->updateExistingPivot($skillId, ['user_rating' => $userRating]);
        }

        //competency score
        $maxScore = count($data['questions']) * 5;

        $mean = round((array_sum($data['questions']) / $maxScore) * 100);

        //Update enroll status
        $user->enrolled()->updateExistingPivot($assessment->id, ['user_status' => 1]);

        $user->update(['competency_rating' => $mean]);

        return redirect()->route('dashboard', ['user' => $user, 'assessment' => $assessment, 'jcp' => $jcp])
            ->with('success', 'Answers submitted successfully!');
    }

        public function update(Request $request, $id)
    {
        $assessment = Assessment::find($id);

        // Validate and update the assessment...
        $assessment->update($request->all());

        return redirect()->route('assessments.index');
    }
    public function submission($id, $assessment_id){
        $user = User::find(Crypt::decrypt($id));
        $assessment = assessment::find(Crypt::decrypt($assessment_id));
         $jcp = $user->jcp()
             ->with('skills.category') // Eager load skills and their categories
             ->where('is_active', 1) // Only load jcp where is_active is 1
             ->first();



             /**
              * Loads Qualification data to assessment
              */
             $userQualifications = $user->qualifications()->get();

             $qualificationsData = [];

             foreach ($jcp->qualifications()->get() as $qualification) {
                 // Check if the qualification exists in the user's acquired qualifications
                 $isAcquired = $userQualifications->contains('qualification_title', $qualification->qualification_title);

                 // Add qualification name and attained status to the data array
                 $qualificationsData[] = [
                     'name' => $qualification->qualification_title,
                     'attained' => $isAcquired,
                 ];
             }

        return view('assessments.submission' , compact('user', 'jcp', 'qualificationsData', 'assessment'));
    }

    public function results($id, $assessment_id){
            $user = User::find(Crypt::decrypt($id));
            $assessment = assessment::find(Crypt::decrypt($assessment_id));
             $jcp = $user->jcp()
                 ->with('skills.category') // Eager load skills and their categories
                 ->where('is_active', 1) // Only load jcp where is_active is 1
                 ->first();



                 /**
                  * Loads Qualification data to assessment
                  */
                 $userQualifications = $user->qualifications()->get();

                 $qualificationsData = [];

                 foreach ($jcp->qualifications()->get() as $qualification) {
                     // Check if the qualification exists in the user's acquired qualifications
                     $isAcquired = $userQualifications->contains('qualification_title', $qualification->qualification_title);

                     // Add qualification name and attained status to the data array
                     $qualificationsData[] = [
                         'name' => $qualification->qualification_title,
                         'attained' => $isAcquired,
                     ];
                 }
        return view('assessments.results', compact('user', 'jcp', 'qualificationsData', 'assessment'));
    }
}
