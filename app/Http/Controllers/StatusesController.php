<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;
use Auth;

class StatusesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function store(Request $request){
        $request= $this->validate($request,[
            'content'=>'max:140|required'
        ]);
        Auth::user()->statuses()->create(['content'=>$request['content']]);
        return redirect()->back();
    }

    public function destroy(Status $status)
    {
        $this->authorize('destroy', $status);
        $status->delete();
        session()->flash('success', '微博已被成功删除！');
        return redirect()->back();
    }
}
