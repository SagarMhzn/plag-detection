<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Assignment;

class TeacherController extends Controller
{
    public function index()
    {
        // $sss = $request->all();
        $data = Assignment::orderBy('created_at', 'DESC')->take(1)->get();
        return view('teacher-home',['recents' =>$data]);
    }
}
