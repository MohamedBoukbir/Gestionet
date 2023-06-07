<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;
use App\Models\Cours;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
   public function indexComment($cours_id){
    $users=User::whereRoleIs('etudiant')->orderby('id','desc')->get();
    $cours = Cours::withCount('readCours')->get();

    session()->put('cours_id', $cours_id);

    $comments = DB::table('users')
              ->join('comments', 'users.id', '=', 'comments.user_id')
              ->join('cours', 'cours.id', '=', 'comments.cours_id')
              ->where('cours.id', $cours_id)
              ->select('users.first_name','users.lastname', 'comments.*')
              ->orderBy('comments.created_at', 'desc')
              ->get();
     return view('prof.dashboard-prof',compact('comments','users','cours'));
   }
   
   public function comments(Request $request){
    //  dd($request->comment_body);
    if($request->comment_body && session()->has('cours_id')){
      $cours = session()->get('cours_id');
      $comments= new Comment();
      $comments->comment_body=$request->comment_body;
      $comments->user_id= auth()->user()->id;
      $comments->cours_id= $cours ;
      $comments->save();
      session()->forget('cours_id');
    }
    return back();
   }
  /**************************** comment etudient ****************************** */
  public function indexCommentetudiant($cours_id){
    // dd($cours_id);
    $user=auth()->user();
    $cours=Cours::where('filiere',$user->filiere)
                  ->where('semestre',$user->semestre)->get();

    session()->put('cours_id', $cours_id);

    $comments = DB::table('users')
              ->join('comments', 'users.id', '=', 'comments.user_id')
              ->join('cours', 'cours.id', '=', 'comments.cours_id')
              ->where('cours.id', $cours_id)
              ->select('users.first_name','users.lastname', 'comments.*')
              ->orderBy('comments.created_at', 'desc')
              ->get();
         return view('etudiant.dashboard-etudiant',compact('cours','comments'));
   }

}
