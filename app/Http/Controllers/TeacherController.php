<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Assignment;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    public function index()
    {
        // $sss = $request->all();
        $teacher_name = Auth::user()->name;
        $data = Assignment::orderBy('created_at', 'DESC')->take(1)->get();
        return view('teacher-home',['recents' =>$data,'teacher_name'=>$teacher_name]);
    }
}
