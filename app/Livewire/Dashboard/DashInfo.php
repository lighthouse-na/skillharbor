<?php

namespace App\Livewire\Dashboard;

use App\Models\Audit\qualification;
use Livewire\Component;

class DashInfo extends Component
{
    public $confirmingAddQualification = false;
    public $confirmingQualificationRemoval = false;
    public $search = '';
    public $qualification_title = '';
    public $qualification_id = '';

    public function mount()
    {
        $this->confirmingAddQualification  = false;
        $this->confirmingQualificationRemoval = false;
        $this->search = '';
        $this->qualification_title = '';
        $this->qualification_id = '';
    }

    public function addQualification()
    {
        $this->dispatch('confirming-add-role');
        $this->confirmingAddQualification = true;
    }


    public function addQualificationToUser()
    {
        $this->validate([
            'qualification_title' => 'required',
        ]);
        $qualification = qualification::where('id', $this->qualification_title)->first();

        $user = auth()->user();
        $user->qualifications()->attach($qualification->id);


        $this->confirmingAddQualification = false;
        $this->qualification_title = ''; // Clear the input after successful submission
    }


    public function confirmQualficationRemoval($id)
    {
        $role = qualification::find($id);
        $this->qualification_title = $role->role_title; // Set the role title for the confirmation message
        $this->dispatch('confirming-qualification-removal');
        $this->confirmingQualificationRemoval = true;
        $this->qualification_id = $id;
    }

    public function deleteQualification($id)
    {

            $user = auth()->user();
            $user->qualifications()->detach($id);
            $this->confirmingQualificationRemoval = false;

    }
    public function render()
    {
        $user = auth()->user();
        $skills = $user->jcp()->with(['skills' => function ($query) {
            $query->where('user_rating', '>', 1)->orderByDesc('user_rating');
        }])->get()->pluck('skills')->flatten()->take(5);

        $qualification = qualification::all();


        $categories = $skills->map(function ($skill) {
            return $skill->categories;
        })->flatten()->unique('id');

        $data = [];
        foreach ($categories as $category) {
            $data[$category->id] = $skills->where('category_id', $category->id)->sum('required_level');
        }



        return view('livewire.dashboard.dash-info', compact('user', 'skills', 'qualification'));
    }
}
