<?php

namespace App\Livewire\System\Org;

use App\Models\User;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class OrgTable extends Component
{
    public $search = '';

    public function index(){

        return view('directories.org.index');

    }
    public function render()
    {
        $users = User::with(['jcp' => function ($query) {
            $query->where('is_active', 1);
        }])->search($this->search)->paginate(10);
        return view('livewire.system.org.org-table', ['users' => $users]);
    }

    public function create () {
        return view('directories.org.create');
    }

    public function store(Request $request) : RedirectResponse
    {
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

        User::create($validatedData);

        return redirect()->route('directories.org.index');
    }



}
