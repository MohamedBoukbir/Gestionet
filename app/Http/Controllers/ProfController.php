<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cours;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfController extends Controller
{
    public function index(){
        $users=User::orderby('id','desc')->get();
        $cours =Cours::orderby('created_at','desc')->get();
        
        return view('prof.dashboard-prof',compact('cours','users'));
    }

    public function addetudiant(Request $request){
        // dd($request->email);
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255','unique:users'],
            'first_name'=>['required'],
            'lastname'=>['required'],
            'Class'=>['required'],
            'cin'=>['required'],
            'cne'=>['required'],
        ]);
        $user=new User();
        $user->email=$request->email;
        $user->first_name=$request->first_name;
        $user->lastname=$request->lastname;
        $user->Class=$request->Class;
        $user->cin=$request->cin;
        $user->cne=$request->cne;
        $user->password= Hash::make('test12345');
        $user->save();
        return back();
    }


    public function addcours(Request $request){
        $request->validate([
            'filiere' => ['required'],
            'module'=>['required'],
            'semestre'=>['required'],
            'cours_name'=>['required'],
            'cours_body'=>['required','mimes:doc,docx,pdf,xls,xlsx'],
        ]);
        $cours=new Cours();
        $pdfPath = $request->file('cours_body')->store('public/cours');
        $pdfPath = str_replace('public', 'storage', $pdfPath);
        $cours->cours_body = $pdfPath;
        $cours->filiere=$request->filiere;
        $cours->module=$request->module;
        $cours->semestre=$request->semestre;
        $cours->cours_name=$request->cours_name;
        $cours->save();
        return back();
    }
}
