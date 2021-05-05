<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Time;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use App\Admin;
use App\Doctor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;



class TimeController extends Controller
{

     public function construct()
    {
        $this->middleware('auth:admin');
    }


     public function index() {
        $user = Auth::user()->id;
        return Time::where('user_id', $user)->orderBy('id', 'asc')->paginate(4);
    }
    

    //
     // Saving to database
    public function store(Request $request) {
         $request->validate([
             'time' => 'required|min:3|max:50',            
            'date' => 'required',
]);

          //saving to db
       $time = new Time;
       $time->time = $request->input('time');
       $time->date = $request->input('date');
       $time->user_id = auth()->user()->id;
       $time->save();

        return ['message' => 'time Save'];

    }

    //updating
    public function update(Request $request, $id)
    {
         $request->validate([
             'time' => 'required|min:3|max:50',            
            'date' => 'required',
            ]);

         //update post
       $time =  Time::find($id);
       $time->time = $request->input('time');
       $time->date = $request->input('date');
       $time->user_id = auth()->user()->id;
       $time->save();
        return ['message' => 'Post updated'];
    }

    
      public function destroy($id)
    {
        $Time =  Time::find($id);
        $Time->delete();
        return ['message' => 'Post Deleted'];

    }
}
