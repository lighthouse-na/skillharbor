<?php

namespace App\Http\Controllers\Audit;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuperviseController extends Controller
{
    //
    public function index()
    {
        return view('supervise.index');
    }
}
