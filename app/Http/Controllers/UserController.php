<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{

    public function store(Request $request)
    {
        // Validate request data
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'salary_ref_number' => 'required|numeric|unique:users',
            'gender' => 'nullable|string|max:255',
            'dob' => 'nullable|date',
            'role' => 'required|string|max:255',
            'competency_rating' => 'nullable|numeric',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        try {
            // Create user
            User::create($validatedData);

            // Redirect user after creation
            return redirect()->route('directories.org.index')->with('success', 'User created successfully!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Validation failed, flash errors to session
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    }


}
