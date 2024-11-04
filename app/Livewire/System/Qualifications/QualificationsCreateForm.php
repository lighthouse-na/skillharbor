<?php

namespace App\Livewire\System\Qualifications;

use App\Models\Audit\qualification;
use Livewire\Component;

class QualificationsCreateForm extends Component
{
    public $qualification_title;

    protected $rules = [
        'qualification_title' => 'required|string|max:255',
    ];

    public function save()
    {
        $this->validate();

        // Create a new qualification
        Qualification::create([
            'qualification_title' => $this->qualification_title,
        ]);

        session()->flash('success', 'Qualification added successfully.');

        return redirect()->route('directories.qualifications.index');
    }

    public function render()
    {
        return view('livewire.system.qualifications.qualifications-create-form');
    }
}
