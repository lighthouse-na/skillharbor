<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use App\Models\Audit\jcp;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class JCPController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $jcp = jcp::all();

        return view('directories.jcp.index', compact('jcp'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('directories.jcp.create');
    }

    public function store(Request $request)
    {
        $jcp = new jcp($request->all());
        $jcp->save();

        return redirect()->route('jcp.index');
    }

    public function show(string $id)
    {
        $jcp = jcp::findOrFail(Crypt::decrypt($id));

        return view('directories.jcp.show', compact('jcp'));
    }

    public function edit(string $id)
    {
        $jcp = jcp::findOrFail(Crypt::decrypt($id));
        $user = User::all();

        return view('directories.jcp.edit', compact('jcp', 'user'));
    }

    public function update(Request $request, string $id)
    {
        // Find the JCP record by decrypted ID
        $jcp = jcp::findOrFail(Crypt::decrypt($id));

        // Update the JCP fields
        $jcp->update([
            'position_title' => $request->position_title,
            'duty_station' => $request->duty_station,
            'job_grade' => $request->job_grade,
            'job_purpose' => $request->job_purpose,
            'is_active' => $request->has('is_active'),
        ]);

        // Reset user_status and supervisor_status for all enrollments related to this JCP
        $user = $jcp->employee; // This gets the User instance related to the JCP

    if ($user) {
        // Update enrollments related to this JCP
        $user->enrolled()->updateExistingPivot($jcp->id, [
            'user_status' => 0,
            'supervisor_status' => 0,
        ]);

    }

        return redirect()->route('jcp.index');
    }



    public function destroy(string $id)
    {
        $jcp = jcp::findOrFail(Crypt::decrypt($id));
        $jcp->delete();

        return redirect()->route('jcp.index');
    }
}
