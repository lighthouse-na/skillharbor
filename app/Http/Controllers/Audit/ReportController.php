<?php

namespace App\Http\Controllers\Audit;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\audit\qualification;
use App\Models\audit\skill;
use App\Models\audit\assessment;


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

            //add csv headers
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
        $filename = 'organizational_report.csv';

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0',
        ];

        return response()->stream(function () {
            $handle = fopen('php://output', 'w');

            // Add CSV headers
            fputcsv($handle, [
                'First Name',
                'Last Name',
                'Skills (with required ratings)',
            ]);

            // Fetch and process data in chunks
            User::chunk(25, function ($employees) use ($handle) {
                foreach ($employees as $employee) {
                    // Retrieve the active JCP based on the 'is_active' flag
                    $activeJcp = $employee->jcp()->where('is_active', 1)->first();

                    // If the employee has an active JCP, fetch their skills from the pivot table
                    if ($activeJcp) {
                        // Assuming the pivot table is named 'jcp_skill' with 'required_rating'
                        $skills = $activeJcp->skills->map(function ($skill) {
                            return $skill->skill_title.' (Required: '.$skill->pivot->required_level.')';
                        })->implode(', ');
                    } else {
                        $skills = 'No active JCP';
                    }

                    // Extract data from each employee.
                    $data = [
                        $employee->first_name ?? '',
                        $employee->last_name ?? '',
                        $skills,
                    ];

                    // Write data to a CSV file.
                    fputcsv($handle, $data);
                }
            });

            // Close CSV file handle
            fclose($handle);
        }, 200, $headers);
    }

    //Added exportQualifications Method -> Shaun
    public function exportQualifications() 
    {
        $filename = 'qualifications.csv';
    
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => 0,
        ];
    
        return response()->stream(function () 
        {
            // Correcting the typo here
            $handle = fopen('php://output', 'w');
    
            fputcsv($handle, ['Qualification Name']);
    
            Qualification::chunk(25, function ($qualifications) use ($handle)
            {
                foreach ($qualifications as $qualification) {
                    fputcsv($handle, [$qualification->qualification_title ?? '']);
                }
            });
    
            fclose($handle);
        }, 200, $headers);
    }
    
        //Added exportSkills Method -> Shaun
        public function exportSkills()
        {
            $filename = 'skills.csv';
        
            $headers = [
                'Content-Type' => 'text/csv',
                'Content-Disposition' => "attachment; filename=\"$filename\"",
                'Pragma' => 'no-cache',
                'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
                'Expires' => 0,
            ];
        
            return response()->stream(function () {
                $handle = fopen('php://output', 'w');
        
                // Add CSV headers
                fputcsv($handle, ['Skill Name', 'JCP Count', 'Skill Required Rating Average']);
        
                // Process skills in chunks to handle large datasets efficiently
                Skill::chunk(100, function ($skills) use ($handle) {
                    foreach ($skills as $skill) {
                        // Use Eloquent's eager loading to minimize queries and improve performance
                        $skill->load('jcps');
        
                        // Calculate JCP count and required rating average for each skill
                        $jcpCount = $skill->jcps->count();
                        $requiredRatingAvg = $skill->jcps->avg('pivot.required_level');
        
                        // Write the data to CSV
                        fputcsv($handle, [
                            $skill->skill_title ?? '',
                            $jcpCount ?? 0,
                            number_format($requiredRatingAvg, 2) ?? '0.00'
                        ]);
                    }
                });
        
                fclose($handle);
            }, 200, $headers);
        }        

    //Added exportAssessments Method -> Shaun
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

        // Add CSV headers
        fputcsv($handle, [
            'Employee Name',
            'JCP Title',
            'Skill Category',
            'Skill Required Level',
            'Skill User Rating',
            'Skill Supervisor Rating'
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

}
