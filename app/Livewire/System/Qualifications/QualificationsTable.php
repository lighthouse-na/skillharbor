<?php

namespace App\Livewire\System\Qualifications;

use App\Models\Audit\qualification;
use Livewire\Component;

class QualificationsTable extends Component
{
    public $search = '';

    public function render()
    {
        return view('livewire.system.qualifications.qualifications-table', ['qualifications' => qualification::search($this->search)->paginate(10)]);
    }

    public function deleteQualification($qualificationId)
    {
        $qualification = Qualification::findOrFail($qualificationId);
        $qualification->delete();
    }
}
