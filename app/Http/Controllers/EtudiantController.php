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
        $user=auth()->user()->id;
        $cours = Cours::find($cours);
        $read=readCours::where('cours_id', $cours->id)
                         ->where('user_id',$user)->first();
        // dd( $read);
        if($read){
            return redirect(asset($cours->cours_body));
        }
        $read=new readCours();
        $read->user_id=$user;
        $read->cours_id=$cours->id;
        $read->save();
        return redirect(asset($cours->cours_body));
    }
}
