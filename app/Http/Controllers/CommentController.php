<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;
use App\Models\Cours;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
   public function indexComment($cours){
    $users=User::whereRoleIs('etudiant')->orderby('id','desc')->get();
    $cours = Cours::withCount('readCours')->get();
    session()->put('cours', $cours);
    $comments = DB::table('users')
              ->join('comments', 'users.id', '=', 'comments.user_id')
              ->join('cours', 'cours.id', '=', 'comments.cours_id')
              ->where('cours.id', $cours)
              ->select('users.first_name','users.lastname', 'comments.*')
              ->orderBy('comments.created_at', 'desc')
              ->get();
     return view('prof.dashboard-prof',compact('comments','users','cours'));
   }
   
   public function comments(Request $request){
    
    if($request->comment_body && session()->has('cours')){
      $cours = session()->get('cours');
      $comments= new Comment();
      $comments->comment_body=$request->comment_body;
      $comments->user_id= auth()->user()->id;
      $comments->cours_id= $cours ;
      $comments->save();
      session()->forget('cours');
    }
    return back();
   }
}
