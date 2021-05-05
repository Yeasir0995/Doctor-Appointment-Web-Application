<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


class ApiController extends Controller
{
    public function create(Request $request)
    {
        $users=new User();
        $users->fname=$request->input('fname');
        $users->fname=$request->input('fname');


    }

}
