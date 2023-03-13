<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        // $sss = $request->all();
        return view('teacher-home');
    }
}
