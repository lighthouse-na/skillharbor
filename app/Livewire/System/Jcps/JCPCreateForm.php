<?php

namespace App\Livewire\System\Jcps;

use Livewire\Component;
use App\Models\Audit\jcp;
use App\Models\Audit\qualification;

class JCPCreateForm extends Component
{
    public $currentPage = 1;

    public $positionTitle = '';
    public $jobGrade = '';
    public $jobPurpose = '';
    public $isActive = '';

     // Page information
     public $pages = [
        1 => [
            'title' => 'Job Competency Profile Information',
            'description' => 'Make sure the information you enter coresponds to the Job Description.',
        ],
        2 => [
            'title' => 'Prerequisite Information',
            'description' => 'Enter the information regarding required qualifications,certifications and/or licenses.',
        ],
        3 => [
            'title' => 'Skills Information',
            'description' => 'Enter the information regarding required skills and abilities.',
        ],

    ];

    public function nextPage()
    {
        $this->currentPage++;
    }

    public function previousPage()
    {
        $this->currentPage--;
    }

    public function save()
    {
        jcp::create(
            $this->only(['positionTitle', 'jobGrade', 'jobPurpose', 'isActive'])
        );

        session()->flash('status', 'JCP successfully created.');

        return $this->redirect('/jcp');
    }

    public function render()
    {
        return view('livewire.system.jcps.j-c-p-create-form',['qualifications' => qualification::all()]);
    }
}
