<?php
namespace App\Livewire\Reports;

use Livewire\Component;

class LoadingButtonAnimation extends Component
{
    public $label;
    public $route;
    public $divisionName;

    public function mount($label, $route, $divisionName = null)
    {
        $this->label = $label;
        $this->route = $route;
        $this->divisionName = $divisionName;
    }

    public function triggerExport()
    {
        if ($this->divisionName) {
            return redirect()->route($this->route, ['divisionName' => $this->divisionName]);
        } else {
            return redirect()->route($this->route);
        }
    }

    public function render()
    {
        return view('livewire.reports.loading-button-animation');
    }
}
