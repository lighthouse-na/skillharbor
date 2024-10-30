<?php

namespace App\Livewire\Dashboard;

use App\Models\Audit\qualification;
use Illuminate\Support\Facades\Auth;
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
        $this->jcp = Auth::user()->jcp()->where('is_active', 1)->first();
        $this->myRating = $this->jcp ? $this->jcp->sumMyLevels() ?? 0 : 0;
        $this->supervisorRating = $this->jcp ? $this->jcp->sumSupervisorLevels() ?? 0 : 0;
        $this->jcpRating = $this->jcp ? $this->jcp->sumRequiredLevelsByCategory() ?? 0 : 0;
        $this->confirmingAddQualification = false;
        $this->confirmingQualificationRemoval = false;
        $this->search = '';
        $this->qualification_title = '';
        $this->qualification_id = '';
    }

    public function addQualification()
    {
        $this->dispatch('confirmingAddQualification');
        $this->confirmingAddQualification = true;
    }

    public function updateQualificationId()
    {

        $this->qualification_id = request()->input('qualification_id');

    }

    public function addQualificationToUser()
    {
        $this->validate([
            'qualification_id' => 'required|exists:qualifications,id',
        ]);

        $qualification = Qualification::find($this->qualification_id);

        Auth::user()->qualifications()->attach($qualification->id);

        $this->confirmingAddQualification = false;
        $this->qualification_id = ''; // Clear the input after successful submission
        session()->flash('message', 'Qualification added successfully!');
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
        $developmentPlans = [
            ['id' => 1, 'name' => 'DevOps Training Plan'],
            ['id' => 2, 'name' => 'UI/UX Design Roadmap'],
            ['id' => 3, 'name' => 'Blockchain Development Strategy'],

        ];
        $user = auth()->user();

        if($this->jcp == null){
            $skills = [];
        }else{
            $skills = $this->jcp->skills()
            ->where('user_rating', '>', 1)
            ->orderByDesc('user_rating')
            ->take(5)
            ->get();
        }


        $qualifications = $user->qualifications()->get();
        $dbQual = qualification::all();

        return view('livewire.dashboard.dash-info', compact('user', 'skills', 'qualifications', 'dbQual', 'developmentPlans'));
    }
}
