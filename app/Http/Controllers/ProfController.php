<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cours;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfController extends Controller
{
    public function index(){
        $users=User::whereRoleIs('etudiant')->orderby('id','desc')->get();
        $cours = Cours::withCount('readCours')->get();
        $comments = DB::table('users')
        ->join('comments', 'users.id', '=', 'comments.user_id')
        ->join('cours', 'cours.id', '=', 'comments.cours_id')
        ->where('cours.id', -1)
        ->select('users.first_name','users.lastname', 'comments.*')
        ->orderBy('comments.created_at', 'desc')
        ->get();

        return view('prof.dashboard-prof',compact('cours','users','comments'));
    }

    public function indexStudent(){
        $users=User::whereRoleIs('etudiant')->orderby('id','desc')->get();
        $cours = Cours::withCount('readCours')->get();
        return view('prof.dashboard-prof-student',compact('users','cours'));
    }

    
    public function addetudiant(Request $request){
        // dd($request->email);
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255','unique:users'],
            'first_name'=>['required'],
            'lastname'=>['required'],
            'semestre'=>['required'],
            'cin'=>['required'],
            'cne'=>['required'],
            'filiere'=>['required'],
        ]);
        $user=new User();
        $user->filiere=$request->filiere;
        $user->email=$request->email;
        $user->first_name=$request->first_name;
        $user->lastname=$request->lastname;
        $user->semestre=$request->semestre;
        $user->cin=$request->cin;
        $user->cne=$request->cne;
        $user->password= Hash::make($request->cne);
        // $user->password = $request->cne;
        $user->save();
        $user->attachRole('etudiant');
        return back();
    }

    public function updateetudiant(Request $request, $user){
        // dd($request->email);
        $request->validate([
            'first_name'=>['required'],
            'lastname'=>['required'],
            'semestre'=>['required'],
            'cin'=>['required'],
            'cne'=>['required'],
            'filiere'=>['required'],
        ]);
        $user=User::find($user);
        if($user->email != $request->email){
            $request->validate([
                'email' => ['required', 'string', 'email', 'max:255']
            ]);
            $user->email=$request->email;
        }
        // dd($user);
        $user->filiere=$request->filiere;
        $user->first_name=$request->first_name;
        $user->lastname=$request->lastname;
        $user->semestre=$request->semestre;
        $user->cin=$request->cin;
        $user->cne=$request->cne;
        $user->password= Hash::make($request->cne);
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
    public function updatecours(Request $request,Cours $cours){
        $request->validate([
            'filiere' => ['required'],
            'module'=>['required'],
            'semestre'=>['required'],
            'cours_name'=>['required'],
            'cours_body'=>['required','mimes:doc,docx,pdf,xls,xlsx'],
        ]);
        // $cours=new Cours();
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
    public function destroyCours(Cours $cours)
    {
        $cours->delete();
        return redirect()->back()->with('success', 'cours a été bien supprimé !!');
    }

    public function destroyEtudiant($user)
    {
     
     $user=User::find($user);
        $user->delete();
        return redirect()->back()->with('success', 'etudiant  a été bien supprimé !!');
    }
}
