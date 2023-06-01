<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfController extends Controller
{
    public function index(){
        return view('prof.dashboard-prof');
    }

    public function addetudiant(Request $request){
        // return view('prof.dashboard-prof');
        dd($request);
    }
}
