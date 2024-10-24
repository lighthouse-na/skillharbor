<?php

namespace App\Livewire\Reports;

use Livewire\Component;

class LoadingButtonAnimation extends Component
{
    public $label;
    public $route;
    public $loading = false;

    public function mount($label, $route)
    {
        $this->label = $label;
        $this->route = $route;
    }

    public function triggerExport()
    {
        // Directly redirect to the export route
        return redirect()->route($this->route);
    }

    public function render()
    {
        return view('livewire.reports.loading-button-animation');
    }
}