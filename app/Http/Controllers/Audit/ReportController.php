<?php

namespace App\Http\Controllers\Audit;

use App\Http\Controllers\Controller;
use App\Models\audit\assessment;
use App\Models\Audit\Division;
use App\Models\audit\qualification;
use App\Models\audit\skill;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ReportController extends Controller
{

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
                'Employee Name',
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
    
        $users = User::all();
        $qualificationUserMappings = \DB::table('qualification_user')->get();
    
        $maxQualifications = $qualificationUserMappings->groupBy('user_id')->max(function ($qualifications) {
            return $qualifications->count();
        });
    
        return response()->stream(function () use ($users, $qualificationUserMappings, $maxQualifications) {
            $handle = fopen('php://output', 'w');
    
            $csvHeaders = ['Employee Name', 'Gender', 'Age'];
            for ($i = 1; $i <= $maxQualifications; $i++) {
                $csvHeaders[] = 'Qualification ' . $i;
            }
            fputcsv($handle, $csvHeaders);
    
            foreach ($users as $user) {
                $employeeName = $user->first_name . ' ' . $user->last_name;
                $gender = $user->gender;
                $age = $user->dob ? Carbon::parse($user->dob)->age : 'Unknown';
    
                $qualificationsForUser = [];
    
                foreach ($qualificationUserMappings as $mapping) {
                    if ($mapping->user_id == $user->id) {
                        $qualificationTitle = qualification::find($mapping->qualification_id)->qualification_title ?? 'Unknown';
                        $qualificationsForUser[] = $qualificationTitle;
                    }
                }
    
                $row = [$employeeName, $gender, $age];
    
                for ($i = 0; $i < $maxQualifications; $i++) {
                    if (isset($qualificationsForUser[$i])) {
                        $row[] = $qualificationsForUser[$i];
                    } else {
                        $row[] = '';
                    }
                }
                fputcsv($handle, $row);
            }
    
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
    
            fputcsv($handle, ['Skill Name', 'Skill Category', 'JCP Count', 'Skill Required Rating Average']);
    
            Skill::with(['category', 'jcps'])->chunk(100, function ($skills) use ($handle) {
                foreach ($skills as $skill) {
                    $jcpCount = $skill->jcps->count();
                    $requiredRatingAvg = $skill->jcps->avg('pivot.required_level');
    
                    $categoryName = $skill->category ? $skill->category->category_title : 'No Category';
    
                    fputcsv($handle, [
                        $skill->skill_title ?? '',
                        $categoryName,
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

    public function exportDivisionQualifications(Request $request)
{
    $divisionName = $request->query('divisionName');

    if (!$divisionName) {
        return redirect()->back()->with('error', 'Division name is required.');
    }

    $filename = Str::slug($divisionName, '_') . '_employee_qualifications_report.csv';

    $headers = [
        'Content-Type'        => 'text/csv',
        'Content-Disposition' => "attachment; filename=\"$filename\"",
        'Pragma'              => 'no-cache',
        'Cache-Control'       => 'must-revalidate, post-check=0, pre-check=0',
        'Expires'             => '0',
    ];

    $users = User::with(['qualifications', 'deparment.division'])
                 ->whereHas('deparment.division', function ($query) use ($divisionName) {
                     $query->where('division_name', $divisionName);
                 })
                 ->get();

    $maxQualifications = $users->max(function ($user) {
        return $user->qualifications->count();
    });

    return response()->stream(function () use ($users, $maxQualifications) {
        $handle = fopen('php://output', 'w');

        $csvHeaders = ['Employee Name', 'Gender', 'Age'];
        for ($i = 1; $i <= $maxQualifications; $i++) {
            $csvHeaders[] = 'Qualification ' . $i;
        }
        fputcsv($handle, $csvHeaders);

        foreach ($users as $user) {
            $employeeName = $user->first_name . ' ' . $user->last_name;
            $gender = $user->gender;
            $age = $user->dob ? Carbon::parse($user->dob)->age : 'Unknown';

            $qualificationsForUser = $user->qualifications->pluck('qualification_title')->toArray();

            $row = [$employeeName, $gender, $age];

            for ($i = 0; $i < $maxQualifications; $i++) {
                $row[] = $qualificationsForUser[$i] ?? '';
            }
            fputcsv($handle, $row);
        }

        fclose($handle);
    }, 200, $headers);
}

}
