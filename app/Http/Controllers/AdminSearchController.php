<?php

namespace App\Http\Controllers;
use App\User;
use App\CourseLanguage;
use App\Attendance;
use App\Grade;

use Illuminate\Http\Request;

class AdminSearchController extends Controller
{
    public function searchStudent(Request $request){
        $filters=[
            "Profile"=>"Profile",
            "Attendance"=>"Attendance",
            "Grades"=>"Grades",
            "All"=>"All"
        ];
        $c=CourseLanguage::all();
        $courses=array();
        foreach($c as $course){
            $courses[$course->id]=$course->course->description.' '.$course->language->name;
        }
        if($request->has('fn')){
            $user=User::where('fileNumber',$request->fn)->first();
            if($user){
                $student=$user->student;
                $attendances=Attendance::where(function($q) use($request,$student){
                    $q->whereHas('student', function($q) use($student){
                        $q->where('id',$student->id);
                    })->whereHas('session.group.course_language', function($q) use($request){
                        $q->where('id',$request->course);
                    });
                })->get();

                $grades=Grade::where(function($q) use($request,$student){
                    $q->whereHas('student', function($q) use($student){
                        $q->where('id',$student->id);
                    })->whereHas('exam', function($q) use($request){
                        $q->where('course_language_id',$request->course);
                    });
                })->get();
            }else{
                $attendances=Null;
                $grades=Null;
            }
        }else{
            $user=Null;
            $attendances=Null;
            $grades=Null;
        }

        return view('Admin.search.studentsearch',compact('courses','filters','user','attendances','grades'));
    }

}
