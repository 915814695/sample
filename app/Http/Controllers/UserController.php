<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create(){
        return view('users.create');
    }

    public function show(User $user){
        return view('users.show',compact('user'));
    }

    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required|max:50',
            'email'=>'required|email|unique:users|max:255',
            'password'=>'required|confirmed|min:6',
        ]);
        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password
        ]);
        session()->flash('success','在这里,你将开始一段新的旅程');
        return redirect()->route('users.show',$user);
    }
}
