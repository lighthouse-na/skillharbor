<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use App\Models\Audit\assessment;
use Illuminate\Http\Request;

class AssessmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $assesment = assessment::all();
        return view('directories.assesment.index', compact('assesment'));
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
        $assesment = assessment::create($request->all());
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
    public function edit(string $id)
    {
        $assesment = assessment::findOrFail($id);
        return view('directories.assessment.edit', compact('assesment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $assessment = assessment::findOrFail($id);
        $assessment->update($request->all());
        return redirect()->route('directories.assessment.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $assessment = assessment::findOrFail($id);
        $assessment->delete();
        return redirect()->route('directories.assesment.index');
    }
}
// watch out for the spelling of assesment in other files
