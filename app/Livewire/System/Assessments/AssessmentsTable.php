<?php

namespace App\Livewire\System\Assessments;

use App\Http\Controllers\System\AssessmentController;
use App\Models\Audit\assessment;
use Livewire\Component;

class AssessmentsTable extends Component
{
    public $search = '';

    public function render()
    {
        return view('livewire.system.assessments.assessments-table', ['assessments' => assessment::search($this->search)->paginate(10)]);
    }

    public function deleteAssessment($assessmentId)
    {
        // Invoke the controller method
        app(AssessmentController::class)->destroy($assessmentId);

    }
}
