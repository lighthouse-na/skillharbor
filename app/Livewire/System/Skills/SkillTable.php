<?php

namespace App\Livewire\System\Skills;

use App\Models\Audit\skill;
use Livewire\Component;

class SkillTable extends Component
{
    public $search = '';

    public function render()
    {
        return view('livewire.system.skills.skill-table', ['skills' => skill::search($this->search)->paginate(10)]);
    }
}
