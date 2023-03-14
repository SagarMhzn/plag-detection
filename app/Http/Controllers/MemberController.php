<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class MemberController extends Controller
{
    //
    function display()
    {
        $data = User::where("role",User::STUDENT)->get();
    
        return view('member',['studentlists' =>$data]);
    }
}
