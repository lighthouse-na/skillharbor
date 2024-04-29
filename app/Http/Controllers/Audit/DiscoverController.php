<?php

namespace App\Http\Controllers\Audit;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DiscoverController extends Controller
{
    //
    public function index(){
        return view('discover.index');
    }
}
