<?php

namespace App\Livewire\System\Skills;

use App\Models\Audit\category;
use App\Models\Audit\skill;
use Livewire\Component;

class SkillTable extends Component
{
    public $search = '';

    public $category = '';

    public function render()
    {
        $skills = skill::when($this->search, function ($query) {
            $query->where('skill_title', 'like', '%'.$this->search.'%')
                ->orWhere('skill_description', 'like', '%'.$this->search.'%');
        })
            ->when($this->category, function ($query) {
                $query->where('skill_category', '=', $this->category);
            })
            ->paginate(10);

        return view('livewire.system.skills.skill-table', ['skills' => $skills, 'categories' => category::all()]);
    }

    public function updateCategory($categoryId)
    {
        $this->category = $categoryId;
    }
}
