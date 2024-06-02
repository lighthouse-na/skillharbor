<?php

namespace App\Livewire\Dashboard;

use App\Models\Audit\jcp_skill;
use App\Models\Audit\qualification;
use Livewire\Component;

class DashInfo extends Component
{
    public $confirmingAddQualification = false;
    public $confirmingQualificationRemoval = false;
    public $search = '';
    public $qualification_title = '';
    public $qualification_id = '';
    public $jcp = '';
    public $jcpRating = [];
    public $myRating = [];
    public $supervisorRating = [];




    public function mount()
    {
        $this->jcp = auth()->user()->jcp()->where('is_active',1)->first();
        $this->myRating = $this->jcp->sumMyLevels();
        $this->supervisorRating = $this->jcp->sumSupervisorLevels();
        $this->jcpRating = $this->jcp->sumRequiredLevelsByCategory();
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
        $skills = $this->jcp->skills()
            ->where('user_rating', '>', 1)
            ->orderByDesc('user_rating')
            ->take(5)
            ->get();

        $qualifications = $user->qualifications()->get();
        $dbQual = qualification::all();


        return view('livewire.dashboard.dash-info', compact( 'user','skills', 'qualifications', 'dbQual'));
    }
}
