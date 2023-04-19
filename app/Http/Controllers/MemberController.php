<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class MemberController extends Controller
{
    //
    function student_display()
    {
        $data = User::where("role",User::STUDENT)->get();
    
        return view('member',['studentlists' =>$data]);
    }

    // function teacher_display()
    // {
    //     $data = User::where("role",User::TEACHER)->get();
    
    //     return view('member',['teacherlists' =>$data]);
    // }

    
}
