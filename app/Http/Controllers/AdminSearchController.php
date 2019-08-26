<?php

namespace LU\Http\Controllers;
use LU\User;
use LU\CourseLanguage;
use LU\Attendance;
use LU\Grade;
use LU\Group;
use LU\Year;
use LU\Session;

use Illuminate\Http\Request;

class AdminSearchController extends Controller
{
    public function searchStudent(Request $request){

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

        return view('Admin.search.studentsearch',compact('courses','user','attendances','grades'));
    }

    public function attendanceReport(Request $request){
        $c=CourseLanguage::all();
        $courses=array();
        foreach($c as $course){
            $courses[$course->id]=$course->course->description.' '.$course->language->name;
        }
        if($request->has('course')){
            if($request->has('attend')){
                $all=array();
                $curyear=Year::where('current_year',1)->first();
                $course=CourseLanguage::find($request->course);
                $students=$course->students;
                
                foreach($students as $student){
                    $stGroups=Group::where('course_language_id',$request->course)->where('year_id',$curyear->id)->where(function($q) use($student){
                        $q->whereHas('students', function($q) use($student){
                            $q->where('student_id',$student->id);
                        });
                    })->get();
                    
                    foreach($stGroups as $group){
                        $sessionsnumber=$group->sessions()->count();
                        $attendancenumber=Attendance::whereHas('session.group', function($q) use($group){
                            $q->where('id',$group->id);
                        })->where('student_id',$student->id)->where('attended_int',1)->count();
                        $studentsessions=Attendance::where('student_id',$student->id)->where(function($q) use($group){
                            $q->whereHas('session.group',function($q) use($group){
                                $q->where('id',$group->id);
                            });
                        })->count();
                        $all[$student->Foreign_fullname][$group->name]=array("totalSessions"=>$sessionsnumber, "totalattendance"=>$attendancenumber, "studentSessions"=>$studentsessions);
                    }
                }
                
            }else{
                $all=Null;
            }
        
            if($request->has('grades')){
                $allg=array();
                $total=array();
                $curyear=Year::where('current_year',1)->first();
                $course=CourseLanguage::find($request->course);
                $students=$course->students;
                $exams=$course->exams;
                
                foreach($students as $student){
                    $sum=0;
                    $grades=Grade::where('year_id',$curyear->id)->where('student_id',$student->id)->where(function($q) use($request){
                        $q->whereHas('exam',function($q) use($request){
                            $q->where('course_language_id',$request->course);
                        });
                    })->get();
                    //return view('Admin.search.test',compact('grades'));
                    
                    if($grades->count()>0){
                        foreach($grades as $grade){
                            $allg[$student->Foreign_fullname][$grade->exam->name]=$grade->grade;
                            if($grade->exam->is_session_one==1){
                                $sum+=$grade->grade;
                            }
                        }
                        $total[$student->Foreign_fullname]=$sum;
                    }else{
                        foreach($exams as $exam){
                            $allg[$student->Foreign_fullname][$exam->name]=-1;
                        }
                        $total[$student->Foreign_fullname]=0;
                    }
                    
                }
                
                
                

            }else{
                $allg=Null;
                $total=Null;
            }   
        }else{
            $all=Null;
            $allg=Null;
            $total=Null;
        }
        return view('Admin.search.attendanceReport',compact('allg','courses','all','total','exams'));

    }

    
}
