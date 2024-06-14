<?php

namespace App\Livewire\Reports;

use App\Models\Audit\assessment;
use App\Models\Audit\Organisation;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;
use Barryvdh\DomPDF\Facade\Pdf;

class SystemReports extends Component
{

    protected $organisation;

    public function __construct()
    {

        $this->organisation = new Organisation;
    }

    public function orgReport($id){
        $employeeCount = $this->organisation->getEmployeeCount();

        $genderSplit = $this->organisation->getGenderSplit();
        $genderLabels = array_keys($genderSplit);
        $genderValues = array_values($genderSplit);

        $genderConfig = '{
            type: "pie",
            data: {
            labels: ' . json_encode($genderLabels) . ',
            datasets: [{
                label: "My First Dataset",
                data: ' . json_encode($genderValues) . ',
                backgroundColor: [
                "rgb(255, 99, 132)",
                "rgb(260, 32, 240)",
                "rgba(160, 32, 240)"
                ],
                hoverOffset: 4
            }]
    }
            };';

        $genderChartURL =  urlencode($genderConfig);

        //$employeeTypeSplitChart
        $employeeTypeSplit = $this->organisation->getEmployeeTypeSplit();
        $typeLabels = array_keys($employeeTypeSplit);
        $typeValues = array_values($employeeTypeSplit);

        $typeConfig = '{
            type: "pie",
            data: {
            labels: ' . json_encode($typeLabels) . ',
            datasets: [{
                label: "My First Dataset",
                data: ' . json_encode($typeValues) . ',
                backgroundColor: [
                "rgb(255, 99, 132)",
                "rgb(260, 32, 240)",
                "rgba(160, 32, 240)"
                ],
                hoverOffset: 4
            }]
    }
            };';
            $typeChartURL =  urlencode($typeConfig);

           //$ageDistribution Chart
            $ageDistribution = $this->organisation->getAgeDistribution();
            $ageLabels = array_keys($ageDistribution);
            $ageValues = array_values($ageDistribution);

            $ageConfig = '{
            type: "bar",
            data: {
            labels: ' . json_encode($ageLabels) . ',
            datasets: [{
                label: "My First Dataset",
                data: ' . json_encode($ageValues) . ',
                backgroundColor: [
                "rgb(255, 99, 132)",
                "rgb(260, 32, 240)",
                "rgba(160, 32, 240)"
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
                labels: ' . json_encode($skillLabels) . ',
                datasets: [{
                    label: "My First Dataset",
                    data: ' . json_encode($skillValues) . ',
                    backgroundColor: [
                    "rgb(255, 99, 132)",
                    "rgb(260, 32, 240)",
                    "rgba(160, 32, 240)"
                    ],
                    hoverOffset: 4
                }]
        }
                };';

                $skillUrl = urlencode($skillConfig);


                $pdf = Pdf::loadView('reports.downloads.organisational_report', compact('genderChartURL','skillUrl','ageUrl','typeChartURL','employeeCount'));

                $filename =  'Telecom_Namibia_CCP.pdf';
                return $pdf->download($filename);

    }


    public function show($id){
        $assessment = assessment::find(Crypt::decrypt($id));
        $employeeCount = $this->organisation->getEmployeeCount();
        $genderSplit = $this->organisation->getGenderSplit();
        $employeeTypeSplit = $this->organisation->getEmployeeTypeSplit();
        $ageDistribution = $this->organisation->getAgeDistribution();
        $assessmentProgress = $this->organisation->getCompletedAssessments(Crypt::decrypt($id));
        $skillGap = $this->organisation->getCompanySkillGap();

        return view('reports.show',
        compact('assessment',
        'employeeCount',
        'genderSplit',
        'employeeTypeSplit',
        'ageDistribution',
        'assessmentProgress',
        'skillGap'
        ));
    }


}
