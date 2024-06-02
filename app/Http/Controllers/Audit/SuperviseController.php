<?php

namespace App\Http\Controllers\Audit;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Audit\assessment;

class SuperviseController extends Controller
{
    //
    public function index()
    {
        return view('supervise.index');
    }

    public function list($id){
        $assessment =  assessment::find($id);

        return view('supervise.show');
    }
}
