<?php

namespace LU\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;
use LU\Grade;
use LU\Year;
use LU\Attendance;

class StudentController extends Controller
{
    public function fetchGradesAndAttendance(){
        $student = Auth::user()->student;
        $curyear=Year::where('current_year',1)->first();
        $attendances=Attendance::where(function($q) use($student,$curyear){
            $q->whereHas('student',function($q) use($student){
                $q->where('id',$student->id);
            })->whereHas('session.group', function($q) use($curyear){
                $q->where('year_id',$curyear->id);
            });
        })->get();
        $grades=$student->grades;
        $sum=0;
        foreach($grades as $key=>$grade){
            if($grade->exam->course_language->course->major->name=="Language" && $grade->exam->is_session_one==1){
                $grades->forget($key);
                $student_id=$grade->student_id;
                $exam_id=$grade->exam_id;
                $date=$grade->created_at;
                $sum=$sum+$grade->grade;
                $languageGrade= new Grade([
                    'student_id'=>$student_id,
                    'exam_id'=>$exam_id,
                    'created_at'=>$date,
                    'updated_at'=>$date,
                    'grade'=>$sum
                ]);
            }
        }
        if(!isset($languageGrade)){
            $languageGrade=Null;
        }
        return view('student.index',compact('student','grades','attendances','languageGrade'));

    }
}
