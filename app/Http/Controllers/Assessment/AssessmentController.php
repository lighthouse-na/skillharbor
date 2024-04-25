<?php

namespace App\Http\Controllers\Assessment;

use App\Http\Controllers\Controller;
use App\Models\Audit\assessment;
use App\Models\Audit\jcp;
use App\Models\User;
use Illuminate\Http\Request;

class AssessmentController extends Controller
{
    //
    public function index($u)
    {
        $id = decrypt($u);
        $user = User::find($id);

        $assessments = $user
            ->assessments()
            ->get();

        return view('assessments.index', compact('assessments', 'user'));
    }

    public function show(User $user, assessment $assessment)
    {
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
}
