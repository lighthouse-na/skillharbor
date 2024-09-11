<?php

namespace App\Http\Controllers\Audit;

use App\Http\Controllers\Controller;
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
}
