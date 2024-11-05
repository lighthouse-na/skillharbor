<?php

namespace App\Http\Controllers\Assessment;

use App\Http\Controllers\Controller;
use App\Models\Audit\assessment;
use App\Models\Audit\jcp;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
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
            ->paginate(4);

        return view('assessments.index', compact('assessments', 'user'));
    }

    public function show($user, $assessment)
    {
        $user = User::find(decrypt($user));
        $assessment = assessment::find(decrypt($assessment));
        $jcp = $user->jcp()
            ->with('skills.category') // Eager load skills and their categories
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
        $assessment = Assessment::find(Crypt::decrypt($id));

        // Validate and update the assessment...
        $assessment->update($request->all());

        return redirect()->route('assessments.index');
    }

    public function submission($id, $assessment_id)
    {
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

        return view('assessments.submission', compact('user', 'jcp', 'qualificationsData', 'assessment'));
    }

    public function results($id, $assessment_id)
    {
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

    public function supervisorResults($user, $assessment)
    {
        $user = User::find(Crypt::decrypt($user));
        $assessment = Assessment::find(Crypt::decrypt($assessment));
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

        //jcp Skills chart Config
        $jcpRating = $jcp->sumRequiredLevelsByCategory(); // Convert single object to array or empty array
        $myRating = is_array($jcp->sumMyLevels()) ? $jcp->sumMyLevels() : [];
        $supervisorRating = is_array($jcp->sumSupervisorLevels()) ? $jcp->sumSupervisorLevels() : [];

        // Extracting categories (labels)
        $labels = array_column($jcpRating, 'category');

        // Extracting values
        $values = array_column($jcpRating, 'value');

        // Extracting values from myRating
        $values2 = array_column($myRating, 'value');

        // Extracting values from supervisorRating
        $values3 = array_column($supervisorRating, 'value');

        // Chart configuration for QuickChart.io
        $chartConfig = '{
            type: "bar",
            data: {
                labels: '.json_encode($labels).',
                datasets: [{
                    type: "line",
                    label: "My Level",
                    data: '.json_encode($values2).',
                    backgroundColor: "rgba(139, 135, 244, 0.2)",
                    borderColor: "rgb(139, 135, 244)",
                    borderWidth: 1,
                    fill: false,
                }, {
                    type: "line",
                    label: "Supervisor Rating",
                    data: '.json_encode($values3).',
                    backgroundColor: "rgba(0, 102, 204, 0.2)",
                    borderColor: "rgb(0, 102, 204)",
                    borderWidth: 1,
                    fill: false,
                }, {
                    type: "bar",
                    label: "JCP Requirement",
                    data: '.json_encode($values).',
                    fill: false,
                    backgroundColor: "rgba(86, 203, 249, 0.2)",
                    borderColor: "rgb(86, 203, 249)",
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        }';


        // Encode chart configuration to JSON

        // Generate chart image URL using QuickChart.io
        $chartUrl = urlencode($chartConfig);

        // Load PDF view with data
        $pdf = Pdf::loadView('assessments.downloads.supervisor_results', compact('user', 'jcp', 'qualificationsData', 'assessment', 'chartUrl'));

        // Define the filename for download
        $filename = $user->first_name.'_'.$user->last_name.'_ECP.pdf';

        // Download the PDF file
        return $pdf->download($filename);
    }

    public function jcpPDF($user, $assessment)
    {
        $user = User::find(Crypt::decrypt($user));
        $assessment = Assessment::find(Crypt::decrypt($assessment));
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

        //jcp Skills chart Config
        $jcpRating = $jcp->sumRequiredLevelsByCategory(); // Convert single object to array or empty array
        $myRating = is_array($jcp->sumMyLevels()) ? $jcp->sumMyLevels() : [];

        // Extracting categories (labels)
        $labels = array_column($jcpRating, 'category');

        // Extracting values
        $values = array_column($jcpRating, 'value');

        // Extracting values from myRating
        $values2 = array_column($myRating, 'value');

        // Chart configuration for QuickChart.io
        $chartConfig = '{
            type: "bar",
            data: {
                labels: '.json_encode($labels).',
                datasets: [{
                    type: "line",
                    label: "My Level",
                    data: '.json_encode($values2).',
                    fill: false,
                    backgroundColor: [
                        "rgba(160, 32, 240, 0.2)"
                    ],
                    borderColor: [
                        "rgb(160, 32, 240)"
                    ],
                    borderWidth: 1
                },{
                    type: "bar",
                    label: "JCP Requirement",
                    data: '.json_encode($values).',
                    fill: false,
                    backgroundColor: [
                        "rgba(255, 99, 132, 0.2)"
                    ],
                    borderColor: "rgb(255, 99, 132)",
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        }';

        // Encode chart configuration to JSON

        // Generate chart image URL using QuickChart.io
        $chartUrl = urlencode($chartConfig);

        // Load PDF view with data
        $pdf = Pdf::loadView('assessments.downloads.jcp', compact('user', 'jcp', 'qualificationsData', 'assessment', 'chartUrl'));

        // Define the filename for download
        $filename = $user->first_name.'_'.$user->last_name.'_JCP.pdf';

        // Download the PDF file
        return $pdf->download($filename);
    }
}
