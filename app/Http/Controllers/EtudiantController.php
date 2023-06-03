<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cours;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EtudiantController extends Controller
{
    public function index(){
        $user=auth()->user();
        $cours=Cours::where('filiere',$user->filiere)
                      ->where('semestre',$user->semestre)->get();
                    //   dd( $cours);
        return view('etudiant.dashboard-etudiant',compact('cours'));
    }
    public function incrementlecture($cours){
        // $user = User::find($userId);
        dd('nadi');
       
    }
}
