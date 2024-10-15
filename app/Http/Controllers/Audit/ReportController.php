<?php

namespace App\Http\Controllers\Audit;

use App\Http\Controllers\Controller;
use App\Models\audit\assessment;
use App\Models\audit\qualification;
use App\Models\audit\skill;
use App\Models\User;

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

    //Added employee_csv Method -> Shaun
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

            fputcsv($handle, [
                'Username',
                'Job Description',
                'Skills (with required ratings)',
                'User Rating',
                'Supervisor Rating',
            ]);

            User::with(['jcp.skills'])->chunk(25, function ($employees) use ($handle) {
                foreach ($employees as $employee) {
                    // Combine first_name and last_name for the username
                    $fullName = $employee->first_name.' '.$employee->last_name;

                    // Check if user has an active JCP (Job Description)
                    $activeJcp = $employee->jcp()->where('is_active', 1)->first();

                    // If the user has an active JCP, fetch their job description
                    if ($activeJcp) {
                        $jobDescription = $activeJcp->position_title ?? 'No Job Description';

                        // Fetch skills, user ratings, and supervisor ratings
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

                    // Extract data for each employee
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

        return response()->stream(function () {
            $handle = fopen('php://output', 'w');

            fputcsv($handle, ['Qualification Name']);

            Qualification::chunk(25, function ($qualifications) use ($handle) {
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
                        number_format($requiredRatingAvg, 2) ?? '0.00',
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
}
