<?php

namespace App\Livewire\Reports;

use App\Models\Audit\assessment;
use App\Models\Audit\Organisation;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class SystemReports extends Component
{

    protected $organisation;

    public function __construct(Organisation $organisation)
    {
        $this->organisation = $organisation;
    }

    public function show($id){
        $assessment = assessment::find(Crypt::decrypt($id));
        $employeeCount = $this->organisation->getEmployeeCount();
        $genderSplit = $this->organisation->getGenderSplit();
        $employeeTypeSplit = $this->organisation->getEmployeeTypeSplit();
        $ageDistribution = $this->organisation->getAgeDistribution();

        dd($employeeCount,$genderSplit,$employeeTypeSplit,$ageDistribution);

        return view('reports.show',
        compact('assessment',
        'employeeCount',
        'genderSplit',
        'employeeTypeSplit',
        'ageDistribution',
        ));
    }


}
