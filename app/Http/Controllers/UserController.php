<?php

namespace App\Http\Controllers;

use App\Actions\Fortify\PasswordValidationRules;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    use PasswordValidationRules;

    public function store(Request $request)
    {
        /**
         * This is the default password for new users
         **/
        $password = 'password';
        /**
         * Default competency rating for new users set to 0 as they have not completed any assessment.
         **/
        $competencyRating = 0;
        // Validate request data
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'salary_ref_number' => 'required|numeric|unique:users',
            'gender' => 'nullable|string|max:255',
            'dob' => 'nullable|date',
            'role' => 'required|string|max:255',
            'competency_rating' => 'nullable|numeric',
            'email' => 'required|string|email|max:255|unique:users',
            'department' => 'required'
        ]);

        try {
            // Create user
            User::create(
                [
                    'first_name' => $request['first_name'],
                    'last_name' => $request['last_name'],
                    'salary_ref_number' => $request['salary_ref_number'],
                    'gender' => $request['gender'],
                    'dob' => $request['dob'],
                    'role' => $request['role'],
                    'competency_rating' => $competencyRating,
                    'email' => $request['email'],
                    'password' => Hash::make($password),
                    'department_id' => $request['department'],
                ]
            );

            // Redirect user after creation
            return redirect()->route('directories.org.index')->with('success', 'User created successfully!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Validation failed, flash errors to session
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    }

    public function index()
    {
        // Retrieve all users
        $users = User::all();

        // Return view with users data
        return view('directories.org.index', compact('users'));
    }

    public function show($id)
    {
        // Find user by ID
        $user = User::findOrFail($id);

        // Return view with user data
        return view('directories.org.show', compact('user'));
    }

    public function edit($id)
    {
        // Find user by ID
        $user = User::findOrFail($id);

        // Return view with user data
        return view('directories.org.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        // Validate request data
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'salary_ref_number' => 'required|numeric|unique:users,salary_ref_number,'.$id,
            'gender' => 'nullable|string|max:255',
            'dob' => 'nullable|date',
            'role' => 'required|string|max:255',
            'competency_rating' => 'nullable|numeric',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            'password' => 'nullable|string|min:8',
        ]);
        try {
            // Find user by ID
            $user = User::findOrFail($id);
            // Update user data
            $user->update($validatedData);

            // Redirect user after update
            return redirect()->route('directories.org.show', $user->id)->with('success', 'User updated successfully!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Validation failed, flash errors to session
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    }

    public function destroy($id)
    {
        // Find user by ID
        $user = User::findOrFail($id);
        // Delete user
        $user->delete();

        // Redirect user after deletion
        return redirect()->route('directories.org.index')->with('success', 'User deleted successfully!');
    }
}
