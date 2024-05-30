<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Models\Audit\qualification;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;

class QualificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $qualifications = qualification::all();
        return view('directories.qualifications.index', compact('qualifications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('directories.qualifications.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $qualification = qualification::create($request->all());
        return redirect()->route('directories.qualifications.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $qualification = qualification::findOrFail($id);
        return view('summaries.qualifications.show', compact('qualification'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $qualification = qualification::findOrFail(Crypt::decrypt($id));
        return view('directories.qualifications.edit', compact('qualification'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $qualification = qualification::findOrFail($id);
        $qualification->update($request->all());
        return redirect()->route('directories.qualifications.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $qualification = qualification::findOrFail($id);
        $qualification->delete();
        return redirect()->route('directories.qualifications.index');
    }
}
