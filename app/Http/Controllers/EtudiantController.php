<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cours;
use App\Models\readCours;
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
        $cours = User::find($cours);

        $read=new readCours();
        $read->user_id=auth()->user()->id;
        $read->cours_id=$cours->id;
        $read->save();
        // dd('nadi');
        // $cours = Cours::where('');
        // if ($user) {
        //     $cours->nombrelire++;
        //    
        // }
        return redirect(asset($cours->cours_body));
    }
}
