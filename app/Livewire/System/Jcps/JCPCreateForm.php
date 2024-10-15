<?php

namespace App\Livewire\System\Jcps;

use App\Models\Audit\assessment;
use App\Models\Audit\Jcp;
use App\Models\Audit\prerequisite;
use App\Models\Audit\qualification;
use App\Models\Audit\skill;
use App\Models\User;
use Livewire\Component;

class JCPCreateForm extends Component
{
    public $currentPage = 1;

    public $user_id = '';

    public $position_title = '';

    public $duty_station = '';

    public $job_grade = '';

    public $job_purpose = '';

    public $is_active = '';

    public $jcp_qualifications = [];

    public $jcp_skills = [];

    public $jcp_prerequisites = [];

    public function mount()
    {
        $this->jcp_skills = [
            ['skill_id' => '', 'required_rating' => 1],
        ];
    }

    // Page information
    public $pages = [
        1 => [
            'title' => 'Job Competency Profile Information',
            'description' => 'Make sure the information you enter corresponds to the Job Description.',
        ],
        2 => [
            'title' => 'Prerequisite Information',
            'description' => 'Enter the information regarding required qualifications, certifications, and/or licenses.',
        ],
        3 => [
            'title' => 'Skills Information',
            'description' => 'Enter the information regarding required skills and abilities.',
        ],
    ];

    public function nextPage()
    {
        $this->validateForm();
        $this->currentPage++;
    }

    public function previousPage()
    {
        $this->currentPage--;
    }

    public function addSkill()
    {
        $this->jcp_skills[] = ['skill_id' => '', 'required_rating' => 1];
    }

    public function removeSkill($index)
    {
        unset($this->jcp_skills[$index]);
        $this->jcp_skills = array_values($this->jcp_skills); // Reindex the array
    }

    public function createJCPInformation()
    {
        $this->save();
    }

    public function save()
    {
        dd($this->validateForm());

        // Check if a record already exists for the given user_id and assessment_id
        $existingJcp = Jcp::where('user_id', $this->user_id)
            ->where('assessment_id', 1)
            ->first();

        if ($existingJcp) {
            session()->flash('error', 'A JCP for this user and assessment already exists.');

            return redirect()->route('jcp.index'); // redirect back with an error message
        }

        // Create a new JCP
        $jcp = Jcp::create([

            'position_title' => $this->position_title,
            'duty_station' => $this->duty_station,
            'job_grade' => $this->job_grade,
            'job_purpose' => $this->job_purpose,

            'is_active' => is_null($this->is_active) ? null : 0,            //Add Frontend for these elements
            'user_id' => $this->user_id,
            'assessment_id' => assessment::find(1)->id, //testing
        ]);

        // Attach qualifications
        foreach ($this->jcp_qualifications as $qualId) {
            $jcp->qualifications()->attach($qualId);
        }

        // Attach prerequisites
        foreach ($this->jcp_prerequisites as $prerequisite_id) {
            $jcp->prerequisites()->attach($prerequisite_id);
        }

        // Attach skills with required rating
        foreach ($this->jcp_skills as $skill) {
            if (! empty($skill['skill_id'])) {
                $jcp->skills()->attach($skill['skill_id'], ['required_level' => $skill['required_rating']]);
            }
        }

        session()->flash('status', 'JCP successfully created.');

        return redirect()->route('jcp.index');
    }

    public function validateForm()
    {
        $rules = [];
        if ($this->currentPage === 1) {
            $rules = [
                'position_title' => 'required|string|max:255',
                'duty_station' => 'required|string|max:255',
                'job_grade' => 'required|string|max:255',
                'job_purpose' => 'required|string',
                'user_id' => 'required|exists:users,id',
            ];
        } elseif ($this->currentPage === 2) {
            $rules = [
                'jcp_qualifications.*' => 'required|exists:qualifications,id',
                'jcp_prerequisites.*' => 'required|exists:prerequisites,id',
            ];
        } elseif ($this->currentPage === 3) {
            $rules = [
                'jcp_skills.*.skill_id' => 'required|exists:skills,id',
                'jcp_skills.*.required_rating' => 'required|integer|min:1|max:5',
            ];
        }

        $this->validate($rules);
    }

    public function render()
    {
        return view('livewire.system.jcps.j-c-p-create-form', [
            'qualifications' => Qualification::all(),
            'skills' => Skill::all(),
            'users' => User::get(['id', 'first_name', 'last_name']),
            'prerequisites' => Prerequisite::all(),
        ]);
    }
}
