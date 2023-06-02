<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfController extends Controller
{
    public function index(){
        $users=User::orderby('id','desc')->get();
        return view('prof.dashboard-prof',compact('users'));
    }

    public function addetudiant(Request $request){
        dd($request->email);
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255','unique:users'],
            'first_name'=>['required'],
            'lastname'=>['required'],
            'Class'=>['required'],
            'cin'=>['required'],
            'cne'=>['required'],
        ]);
        $user=new User();
        dd($request);
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
}
