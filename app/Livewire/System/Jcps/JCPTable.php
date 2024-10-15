<?php

namespace App\Livewire\System\Jcps;

use App\Models\Audit\jcp;
use Livewire\Component;

class JCPTable extends Component
{
    public $search = '';

    //Delete a JCP
    public function deleteJCP(jcp $jcpId)
    {
        $jcpId->delete();
    }

    public function render()
    {
        return view('livewire.system.jcps.j-c-p-table', ['jcps' => jcp::search($this->search)->paginate(10)]);
    }
}
