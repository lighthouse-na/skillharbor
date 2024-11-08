<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use App\Models\Audit\assessment;
use App\Models\Audit\Department;
use App\Models\Audit\Division;
use App\Models\Audit\enrollment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class AssessmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $assesment = assessment::all();

        return view('directories.assessments.index', compact('assesment'));
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     return view('directories.assesment.create');
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'assessment_title' => 'required|string|max:255',
            'department_ids' => 'required|array',
            'department_ids.*' => 'exists:departments,id',
            'closing_date' => 'required|date|after:today',
        ]);

        // Create the assessment
        $assessment = assessment::create([
            'assessment_title' => $request->input('assessment_title'),
            'closing_date' => $request->input('closing_date'),
        ]);

        // Get the users in the selected departments
        $departmentIds = $request->input('department_ids');
        $users = User::whereIn('department_id', $departmentIds)->get();

        // Create enrollments for each user in the selected departments
        foreach ($users as $user) {
            enrollment::create([
                'user_id' => $user->id,
                'assessment_id' => $assessment->id,
                'user_status' => 0,
                'supervisor_status' => 0,
            ]);
        }

        return redirect()->route('assessments.index')->banner('Assessment successfully created!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $assesment = assessment::findOrFail($id);

        return view('summaries.assesment.show', compact('assesment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Retrieve the assessment based on the ID
        $assessment = assessment::findOrFail(Crypt::decrypt($id));
        $divisions = Division::all();
        // Pass the $assessment variable to the view
        $enrolledDepartmentIds = $assessment->getEnrolledDepartmentIds();
        return view('directories.assessments.edit', compact('assessment','divisions', 'enrolledDepartmentIds'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    // Decrypt the ID and find the assessment or fail
    $assessment = Assessment::findOrFail(Crypt::decrypt($id));

    // Define validation rules
    $validatedData = $request->validate([
        'assessment_title' => 'required|string|max:255',
        'department_ids' => 'required|array',
        'department_ids.*' => 'exists:departments,id',
        'closing_date' => 'required|date|after:today',
    ]);

    // Update assessment fields
    $assessment->update([
        'assessment_title' => $validatedData['assessment_title'],
        'closing_date' => $validatedData['closing_date'],
    ]);

    // Update department enrollments
    $departmentIds = $validatedData['department_ids'];
    $users = User::whereIn('department_id', $departmentIds)->get();

    // Ensure existing enrollments are updated or add new ones
    $existingEnrollments = Enrollment::where('assessment_id', $assessment->id)->pluck('user_id')->toArray();

    foreach ($users as $user) {
        if (!in_array($user->id, $existingEnrollments)) {
            Enrollment::create([
                'user_id' => $user->id,
                'assessment_id' => $assessment->id,
                'user_status' => 0,
                'supervisor_status' => 0,
            ]);
        }
    }
    return redirect()->route('assessments.index')->banner('Assessment Updated!');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
            $assessment = Assessment::findOrFail($id);
            // Delete the enrollments associated with the assessment
            // Delete the assessment itself
            $assessment->delete();

        // Redirect or return a response
        return redirect()->route('assessments.index');
    }

    /**
     * Create New Assesment
     */
    public function create()
    {
        $divisions = Division::all();
        // Return the view to show the create assessment form
        return view('directories.assessments.create', compact('divisions'));
    }
}
