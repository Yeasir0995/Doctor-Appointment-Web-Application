<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userController extends Controller
{
    public  function index()
    {
        return view('user.index');
    }
    public function fetch()
    {
        return User::All();
    }
    public function validation($request)
    {
        return $request->validate([
            'firstname' => 'required|min:3|max:50',            
            'lastname' => 'required|max:255',
            'email' => 'required|email|unique:users|max:255',
              'dob'=>'required',
            'password' => ['required', 'min:8', 'same:password'],
            'confirmed_password' => ['required', 'min:8', 'same:password'], 
            ]);
    
    }

    public function update(Request $request, $id)
    {
          $user = User::find($id);
         $request->validate([
            'firstname' => 'required|min:3|max:50',            
            'lastname' => 'required|max:255',
            'email' => 'required|max:191|email|unique:users,email,' . $user->id,
        
           'dob'=>'required',
            'password' => ['required', 'min:8', 'same:password'],
            'confirmed_password' => ['required', 'min:8', 'same:password'], 
            ]);

         //update post
       $User =  User::find($id);
       $User->firstname = $request->input('firstname');
       $User->lastname = $request->input('lastname');
       $User->email = $request->input('email');
       $User->dob = $request->input('dob');
            
       $User->password = $request->input('password');      
      $User->id = auth()->user()->id;
       $User->save();
        return ['message' => 'User updated'];
    }

    public function destroy($id)
    {
        $User =  User::find($id);
        $User->delete();
        return ['message' => 'User Deleted'];

    }
}
