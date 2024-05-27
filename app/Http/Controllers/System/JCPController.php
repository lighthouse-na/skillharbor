<?php

namespace App\Http\Controllers\System;

use App\Models\User;
use App\Models\Audit\jcp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        $jcp = jcp::findOrFail($id);
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
        $jcp = jcp::findOrFail($id);
        $jcp->update($request->all());

        return redirect()->route('jcp.index');
    }

    public function destroy(string $id)
    {
        $jcp = jcp::findOrFail($id);
        $jcp->delete();

        return redirect()->route('jcp.index');
    }
}
