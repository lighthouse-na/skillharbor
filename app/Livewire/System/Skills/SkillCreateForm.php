<?php

namespace App\Livewire\System\Skills;

use App\Models\Audit\Category;
use App\Models\Audit\Skill;
use Livewire\Component;

class SkillCreateForm extends Component
{
    public $skill_title;

    public $skill_description;

    public $skill_category_id;

    public $categories;

    protected $rules = [
        'skill_title' => 'required|string|max:255',
        'skill_description' => 'required|string',
        'skill_category_id' => 'required|exists:categories,id',
    ];

    public function mount()
    {
        $this->categories = Category::all();
    }

    public function render()
    {
        return view('livewire.system.skills.skill-create-form');
    }

    public function saveSkill()
    {
        $this->validate();

        // Create a new skill record in the database
        Skill::create([
            'skill_title' => $this->skill_title,
            'skill_description' => $this->skill_description,
            'skill_category_id' => $this->skill_category_id,
        ]);

        // Clear input fields after saving
        $this->reset(['skill_title', 'skill_description', 'skill_category_id']);

        // Redirect to the skills index page after saving
        return redirect()->route('directories.skills.index');
    }
}
