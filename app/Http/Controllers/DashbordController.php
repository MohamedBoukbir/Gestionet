<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashbordController extends Controller
{
    public function logincontrole()
    {

        $user=auth()->user();
        // dd($user);
        try{
           
            switch ($user) {
                case $user->hasRole('prof'):
                    return redirect()->route('prof');
                    break;
                case $user->hasRole('etudiant'):
                    return redirect()->route('etudiant');
                    break;
                default:
                    return back();
            }
       
        }catch(Exception $e){
            return back();
               
            }
 }
}
