<?php

namespace App\Livewire\System\Jcps;

use Livewire\Component;
use App\Models\Audit\jcp;

class JCPCreateForm extends Component
{
    public $positionTitle = '';
    public $jobGrade = '';
    public $jobPurpose = '';
    public $isActive = '';

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
        return view('livewire.system.jcps.j-c-p-create-form');
    }
}
