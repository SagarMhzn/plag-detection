<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assignment;
use App\Models\Doc;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function index()
    {
        $data = Assignment::orderBy('created_at', 'DESC')->take(1)->get();
        // $teacher_name = Assignment::where('student_id',Auth::user()->id)->get();


        return view('student-home',['recents' =>$data]);

        
    }

    // public function showstudent()
    // {
    //     $data = Doc::where()->get();

    //     return view('student-home',['showfile' =>$data]);
    // }
    public function show()
    {
        $datas = Doc::where('student_id',Auth::user()->id)->get();
        return view('showstudent',['showfile' =>$datas]);
    }
    
}
