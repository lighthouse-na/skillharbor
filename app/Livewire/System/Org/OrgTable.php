<?php

namespace App\Livewire\System\Org;

use App\Models\User;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;


class OrgTable extends Component
{
    public $search = '';

    public function index(){

        return view('directories.org.index');

    }
    public function render()
    {
        $users = User::with(['jcp' => function ($query) {
            $query->where('is_active', 1);
        }])->search($this->search)->paginate(10);
        return view('livewire.system.org.org-table', ['users' => $users]);
    }

    public function create () {
        return view('directories.org.create');
    }


}
