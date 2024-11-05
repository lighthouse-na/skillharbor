<?php

namespace App\Http\Controllers\Audit;

use App\Http\Controllers\Controller;
use App\Models\audit\assessment;
use App\Models\audit\qualification;
use App\Models\audit\skill;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ReportController extends Controller
{
    //
    public function index()
    {
        return view('reports.index');
    }

    public function roles_csv()
    {
        $filename = 'organisation_roles.csv';

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0,pre-check=0',
            'Expires' => 0,
        ];

        return response()->stream(function () {
            $handle = fopen('php://output', 'w');

            fputcsv($handle, [
                'first_name',
                'last_name',
                'role',
            ]);

            User::chunk(25, function ($employees) use ($handle) {
                foreach ($employees as $employee) {
                    $data = [
                        isset($employee->first_name) ? $employee->first_name : '',
                        isset($employee->last_name) ? $employee->last_name : '',
                        isset($employee->role) ? $employee->role : '',

                    ];
                    fputcsv($handle, $data);
                }
            });
            fclose($handle);
        }, 200, $headers);

    }

    public function employee_csv()
    {
        $filename = 'organizational_employee_report.csv';

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0',
        ];

        return response()->stream(function () {
            $handle = fopen('php://output', 'w');

            fputcsv($handle, [
                'Username',
                'Job Description',
                'Skills (with required ratings)',
                'User Rating',
                'Supervisor Rating',
            ]);

            User::with(['jcp.skills'])->chunk(25, function ($employees) use ($handle) {
                foreach ($employees as $employee) {
                    $fullName = $employee->first_name.' '.$employee->last_name;

                    $activeJcp = $employee->jcp()->where('is_active', 1)->first();

                    if ($activeJcp) {
                        $jobDescription = $activeJcp->position_title ?? 'No Job Description';

                        $skills = $activeJcp->skills->map(function ($skill) {
                            return $skill->skill_title.' (Required: '.$skill->pivot->required_level.')';
                        })->implode(', ');

                        $userRatings = $activeJcp->skills->map(function ($skill) {
                            return $skill->pivot->user_rating;
                        })->implode(', ');

                        $supervisorRatings = $activeJcp->skills->map(function ($skill) {
                            return $skill->pivot->supervisor_rating;
                        })->implode(', ');
                    } else {
                        $jobDescription = 'No active JCP';
                        $skills = 'No Skills';
                        $userRatings = 'No Ratings';
                        $supervisorRatings = 'No Supervisor Ratings';
                    }

                    $data = [
                        $fullName,
                        $jobDescription,
                        $skills,
                        $userRatings,
                        $supervisorRatings,
                    ];

                    fputcsv($handle, $data);
                }
            });

            fclose($handle);
        }, 200, $headers);
    }

    public function exportQualifications()
    {
        $filename = 'organisational_employee_qualifications_report.csv';
    
        $headers = [
            'Content-Type'        => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
            'Pragma'              => 'no-cache',
            'Cache-Control'       => 'must-revalidate, post-check=0, pre-check=0',
            'Expires'             => '0',
        ];
    
        return response()->stream(function () {
            $handle = fopen('php://output', 'w');
    
            fputcsv($handle, ['Employee Name', 'Gender', 'Age', 'Qualifications']);
    
            User::chunk(25, function ($users) use ($handle) {
                foreach ($users as $user) {
                    $userId = $user->id;
    
                    $employeeName = $user->first_name . ' ' . $user->last_name;
                    $gender = $user->gender;
                    $age = $user->dob ? Carbon::parse($user->dob)->age : 'Unknown';
    
                    $qualificationIds = \DB::table('qualification_user')
                        ->where('user_id', $userId)
                        ->pluck('qualification_id');
    
                    if ($qualificationIds->isEmpty()) {
                        fputcsv($handle, [$employeeName, $gender, $age, 'None']);
                    } else {
                        $qualifications = \App\Models\Audit\qualification::whereIn('id', $qualificationIds)
                            ->pluck('qualification_title');
    
                        $qualificationsString = $qualifications->implode(', ');
    
                        fputcsv($handle, [$employeeName, $gender, $age, $qualificationsString]);
                    }
                }
            });
    
            fclose($handle);
        }, 200, $headers);
    }
    public function exportSkills()
    {
        $filename = 'organisational_skills_report.csv';

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => 0,
        ];

        return response()->stream(function () {
            $handle = fopen('php://output', 'w');

            fputcsv($handle, ['Skill Name', 'JCP Count', 'Skill Required Rating Average']);

            Skill::chunk(100, function ($skills) use ($handle) {
                foreach ($skills as $skill) {
                    $skill->load('jcps');

                    $jcpCount = $skill->jcps->count();
                    $requiredRatingAvg = $skill->jcps->avg('pivot.required_level');

                    fputcsv($handle, [
                        $skill->skill_title ?? '',
                        $jcpCount ?? 0,
                        number_format($requiredRatingAvg, 2) ?? '0.00',
                    ]);
                }
            });

            fclose($handle);
        }, 200, $headers);
    }

    public function exportAssessments()
    {
        $filename = 'assessments.csv';

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => 0,
        ];

        return response()->stream(function () {
            $handle = fopen('php://output', 'w');

            fputcsv($handle, [
                'Employee Name',
                'JCP Title',
                'Skill Category',
                'Skill Required Level',
                'Skill User Rating',
                'Skill Supervisor Rating',
            ]);

            Assessment::chunk(25, function ($assessments) use ($handle) {
                foreach ($assessments as $assessment) {
                    $data = [
                        $assessment->employee->full_name ?? '',
                        $assessment->jcp->title ?? '',
                        $assessment->skill->category ?? '',
                        $assessment->skill->pivot->required_level ?? '',
                        $assessment->user_rating ?? '',
                        $assessment->supervisor_rating ?? '',
                    ];

                    fputcsv($handle, $data);
                }
            });

            fclose($handle);
        }, 200, $headers);
    }

    public function exportDivisionEmployees(Request $request)
    {
        $divisionName = $request->query('divisionName');

        if (!$divisionName) {
            return redirect()->back()->with('error', 'Division name is required.');
        }

        $filename = Str::slug($divisionName, '_') . '_employee_report.csv';

        $headers = [
            'Content-Type'        => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
            'Pragma'              => 'no-cache',
            'Cache-Control'       => 'must-revalidate, post-check=0, pre-check=0',
            'Expires'             => '0',
        ];

        return response()->stream(function () use ($divisionName) {
            $handle = fopen('php://output', 'w');

            fputcsv($handle, [
                'Employee Name',
                'Job Description',
                'Skills (with required ratings)',
                'User Rating',
                'Supervisor Rating',
            ]);

            User::with(['jcp.skills', 'deparment.division'])
                ->whereHas('deparment.division', function ($query) use ($divisionName) {
                    $query->where('division_name', $divisionName);
                })
                ->chunk(25, function ($employees) use ($handle) {
                    foreach ($employees as $employee) {
                        $fullName = $employee->first_name . ' ' . $employee->last_name;

                        $activeJcp = $employee->jcp()->where('is_active', 1)->first();

                        if ($activeJcp) {
                            $jobDescription = $activeJcp->position_title ?? 'No Job Description';

                            $skills = $activeJcp->skills->map(function ($skill) {
                                return $skill->skill_title . ' (Required: ' . $skill->pivot->required_level . ')';
                            })->implode(', ');

                            $userRatings = $activeJcp->skills->pluck('pivot.user_rating')->implode(', ');

                            $supervisorRatings = $activeJcp->skills->pluck('pivot.supervisor_rating')->implode(', ');
                        } else {
                            $jobDescription     = 'No active JCP';
                            $skills             = 'No Skills';
                            $userRatings        = 'No Ratings';
                            $supervisorRatings  = 'No Supervisor Ratings';
                        }

                        $data = [
                            $fullName,
                            $jobDescription,
                            $skills,
                            $userRatings,
                            $supervisorRatings,
                        ];

                        fputcsv($handle, $data);
                    }
                });

            fclose($handle);
        }, 200, $headers);
    }
}
