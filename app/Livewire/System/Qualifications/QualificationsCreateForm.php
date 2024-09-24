<?php

namespace App\Livewire\System\Qualifications;

use App\Models\Audit\qualification;
use Livewire\Component;

class QualificationsCreateForm extends Component
{

    public $qualification_title = '';
    public function save()
    {
        Qualification::create([
            'qualification_title' => $this->qualification_title,

        ]);

        session()->flash('status', 'Qualification successfully created.');

        return $this->redirect('/qualifications');
    }
    public function render()
    {
        return view('livewire.system.qualifications.qualifications-create-form');
    }
}
