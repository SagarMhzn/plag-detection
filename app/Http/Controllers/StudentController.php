<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assignment;
use App\Models\Doc;

class StudentController extends Controller
{
    public function index()
    {
        $data = Assignment::orderBy('created_at', 'DESC')->take(1)->get();
       
        return view('student-home',['recents' =>$data]);
    }

    // public function showstudent()
    // {
    //     $data = Doc::where()->get();

    //     return view('student-home',['showfile' =>$data]);
    // }
    public function show()
    {
        $datas = Doc::all();
        return view('showstudent',['showfile' =>$datas]);
    }
    
}
