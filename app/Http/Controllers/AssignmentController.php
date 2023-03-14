<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssignmentController extends Controller
{
    public function PendingAssignments(Request $request)
    {
       $pending_assignments = Assignment::where('teacher_id', Auth::id())->orderBy('created_at', 'DESC')->get();
        return view('pending_assignment', compact('pending_assignments'));
    }

    public function storeAssignment(Request $request) {
        Assignment::create($request->all());
        return redirect()->back()->with('successMessage', 'Assignment posted successfully!');
    }

    public function studentPendingAssignments(Request $request)
    {
        $pending_assignments = Assignment::orderBy('created_at', 'DESC')->get();
        return view('student_pending_assignment', compact('pending_assignments'));
        
    }
}
