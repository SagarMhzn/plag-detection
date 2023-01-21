<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    public function PendingAssignments(Request $request)
    {
        return view('pending_assignment_student');
    }
}
