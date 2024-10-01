<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use App\Models\Audit\assessment;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;

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
    public function create()
    {
        return view('directories.assesment.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        assessment::create($request->all());

        return redirect()->route('directories.assesment.index');    }

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
        $assessment = Assessment::findOrFail(Crypt::decrypt($id));

        // Pass the $assessment variable to the view

        return view('directories.assessments.edit', compact('assessment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $assessment = assessment::findOrFail($id);
        $assessment->update($request->all());
        return redirect()->route('directories.assessments.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $assessment = assessment::findOrFail($id);

        $assessment->delete();
        return redirect()->route('assessments.index');
    }

/**
 * Create New Assesment 
 */
public function create()
{
    // Return the view to show the create assessment form
    return view('assessments.create');
}
}
// watch out for the spelling of assesment in other files
