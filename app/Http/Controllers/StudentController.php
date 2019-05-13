<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function fetchGradesAndAttendance(){
        $student = Auth::user()->student;
        $grades=$student->grades;
        $attendances=$student->attendances;
        return view('student.index',compact('student','grades','attendances'));
    }
}
