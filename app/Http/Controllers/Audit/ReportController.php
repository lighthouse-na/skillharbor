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

    public function csv()
    {
        $filename = 'organsational-report.csv';

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
                'Email',
                'Date of Birth',
                'Gender',
                'Skills',
            ]);

            // Fetch and process data in chunks
            User::chunk(25, function ($employees) use ($handle) {
                foreach ($employees as $employee) {
                    // Extract data from each employee.
                    $data = [
                        isset($employee->first_name) ? $employee->first_name : '',
                        isset($employee->last_name) ? $employee->last_name : '',
                        isset($employee->email) ? $employee->email : '',
                        isset($employee->date_of_birth) ? $employee->date_of_birth : '',
                        isset($employee->gender) ? $employee->gender : '',
                        isset($employee->basic_salary) ? $employee->basic_salary : '',
                        isset($employee->skills) ? implode(', ', json_decode($employee->skills)) : '',
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
