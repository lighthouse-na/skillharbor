<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\assessment;

class AssessmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $assessments = Assessment::all();
        return view('assessments.index', compact('assessments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('assessments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $assessment = assessment::create($request->all());
        return redirect()->route('assessments.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $assessment = assessment::findOrFail($id);
        return view('assessments.show', compact('assessment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $assessment = assessment::findOrFail($id);
        return view('assessments.edit', compact('assessment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $assessment = assessment::findOrFail($id);
        $assessment->update($request->all());
        return redirect()->route('assessments.index');
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
}
