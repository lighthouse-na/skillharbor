<?php

namespace App\Livewire\Reports;

use App\Models\Audit\assessment;
use App\Models\Audit\Division;
use App\Models\Audit\Organisation;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class SystemReports extends Component
{
    protected $organisation;

    public function __construct()
    {

        $this->organisation = new Organisation;
    }

    public function orgReport($id)
    {
        $employeeCount = $this->organisation->getEmployeeCount();

        $genderSplit = $this->organisation->getGenderSplit();
        $genderLabels = array_keys($genderSplit);
        $genderValues = array_values($genderSplit);

        $genderConfig = '{
            type: "doughnut",
            data: {
            labels: '.json_encode($genderLabels).',
            datasets: [{
                label: "Gender Distribution",
                data: '.json_encode($genderValues).',
                backgroundColor: [
               "rgb(255, 99, 132)",
                    "rgb(255, 159, 64)",
                    "rgb(255, 205, 86)",
                    "rgb(75, 192, 192)",
                    "rgb(54, 162, 235)",
                    ],
                hoverOffset: 4
            }]
    }
            };';

        $genderUrl = urlencode($genderConfig);

        //$employeeTypeSplitChart
        $employeeTypeSplit = $this->organisation->getEmployeeTypeSplit();
        $typeLabels = array_keys($employeeTypeSplit);
        $typeValues = array_values($employeeTypeSplit);

        $typeConfig = '{
            type: "doughnut",
            data: {
            labels: '.json_encode($typeLabels).',
            datasets: [{
                label: "Employee Types",
                data: '.json_encode($typeValues).',
                backgroundColor: [
               "rgb(255, 99, 132)",
                    "rgb(255, 159, 64)",
                    "rgb(255, 205, 86)",
                    "rgb(75, 192, 192)",
                    "rgb(54, 162, 235)",
                    ],
                hoverOffset: 4
            }]
    }
            };';
        $typeUrl = urlencode($typeConfig);

        //$ageDistribution Chart
        $ageDistribution = $this->organisation->getAgeDistribution();
        $ageLabels = array_keys($ageDistribution);
        $ageValues = array_values($ageDistribution);

        $ageConfig = '{
            type: "bar",
            data: {
            labels: '.json_encode($ageLabels).',
            datasets: [{
                label: "Age Distribution",
                data: '.json_encode($ageValues).',
                backgroundColor: [
                "rgb(255, 99, 132)",
                    "rgb(255, 159, 64)",
                    "rgb(255, 205, 86)",
                    "rgb(75, 192, 192)",
                    "rgb(54, 162, 235)",

                ],
                hoverOffset: 4
            }]
    }
            };';

        $ageUrl = urlencode($ageConfig);

        //        $skillGap Chart

        $skillGap = $this->organisation->getCompanySkillGap();
        $skillLabels = array_keys($skillGap);
        $skillValues = array_values($skillGap);
        $skillConfig = '{
                type: "bar",
                data: {
                labels: '.json_encode($skillLabels).',
                datasets: [{
                    label: "Company Skill Gap",
                    data: '.json_encode($skillValues).',
                   backgroundColor: [
                    "rgb(255, 99, 132)",
                    "rgb(255, 159, 64)",
                    "rgb(255, 205, 86)",
                    "rgb(75, 192, 192)",
                    "rgb(54, 162, 235)",
                    ],
                    hoverOffset: 4,

                }]
        }
                };';

        $skillUrl = urlencode($skillConfig);
        $divisions = Division::all();

        $pdf = Pdf::loadView('reports.downloads.organisational_report', compact('genderUrl', 'skillUrl', 'ageUrl', 'typeUrl', 'employeeCount', 'divisions'));

        $filename = 'Telecom_Namibia_CCP.pdf';

        return $pdf->download($filename);

    }

    public function show($id)
    {

        $assessment = assessment::find(Crypt::decrypt($id));
        $employeeCount = $this->organisation->getEmployeeCount();
        $genderSplit = $this->organisation->getGenderSplit();
        $employeeTypeSplit = $this->organisation->getEmployeeTypeSplit();
        $ageDistribution = $this->organisation->getAgeDistribution();
        $assessmentProgress = $this->organisation->getCompletedAssessments(Crypt::decrypt($id));
        $skillGap = $this->organisation->getCompanySkillGap();
        $divisions = Division::all();

        return view('reports.show',
            compact('assessment',
                'employeeCount',
                'genderSplit',
                'employeeTypeSplit',
                'ageDistribution',
                'assessmentProgress',
                'skillGap',
                'divisions'
            ));
    }
}
