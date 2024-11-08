<?php

namespace App\Http\Controllers\Audit;

use App\Http\Controllers\Controller;
use App\Models\Audit\assessment;
use Illuminate\Support\Facades\Crypt;

class SuperviseController extends Controller
{
    //
    public function index()
    {
        return view('supervise.index');
    }

    public function list($id)
    {
        $assessment = assessment::find(Crypt::decrypt($id));

        return view('supervise.show',compact('assessment'));
    }
}
