<?php

namespace App\Livewire\System\Jcps;

use App\Models\Audit\jcp;
use Livewire\Component;

class JCPTable extends Component
{
    public $search = '';
    public function render()
    {
        return view('livewire.system.jcps.j-c-p-table',['jcps' => jcp::search(request('search'))->paginate(10)]);
    }
}
