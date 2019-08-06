<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Group;
use App\Grade;
use App\Exam;
use App\Student;
use Illuminate\Support\Facades\Input;
use App\Session;
use App\Attendance;


class AdminAttendanceAndGradesController extends Controller
{
    public function listGroups(){
        $groups=Group::all();
        return view('Admin.grades.index', compact('groups'));
    }

    public function showGroup($group_id){
        $group=Group::find($group_id);
        $course=$group->course_language;
        $exams=Exam::where(function($q) use ($course){
            $q->wherehas('course_language', function($q) use($course){
                $q->where('id',$course->id);
            })->where('is_written_exam',1);
        })->get()->pluck('name', 'id')->toArray();
        $students=$group->students;
        return view('Admin.grades.showGroup', compact('group','students','exams'));
    }

    public function fillGrades(Request $request,$group_id){
        $maxsum=0;
        $finalgrade=0;
        $group=Group::find($group_id);
        $groupstudents=$group->students;
        $students=new Collection();
        $course=$group->course_language;
        $exam=Exam::find($request->exam);
        if($exam->is_session_one==0){
            foreach($groupstudents as $student){
                $sgrades=Grade::where(function($q) use($course,$student){
                    $q->whereHas('student', function($q) use($student){
                        $q->where('id',$student->id);
                    })->whereHas('exam', function($q) use($course){
                        $q->where('course_language_id',$course->id)->where('is_session_one',1);
                    });
                })->get();
                foreach($sgrades as $grade){
                    $maxsum=$maxsum+$grade->exam->max_grade;
                    $finalgrade=$finalgrade+$grade->grade;
                }
                if($finalgrade<($maxsum/2) && !Grade::where('student_id',$student->id)->where('exam_id',$exam->id)->exists())
                    $students->push($student);
                $maxsum=0;
                $finalgrade=0;    
            }
        }else{
            foreach($groupstudents as $student){
                if(!Grade::where('student_id',$student->id)->where('exam_id',$exam->id)->exists())
                    $students->push($student);
            }
        }
        return view('Admin.grades.fillGrades',compact('students','exam','group_id','sgrades'));
    }

    public function storeGrades(Request $request,$group_id){
        $group=Group::find($group_id);
        $groupYear=$group->year;
        $input=$request->all();
        foreach($input['grades'] as $student_id=>$exams){
            foreach($exams as $exam_id=>$grade){
                $grade=Grade::create([
                    'student_id'=>$student_id,
                    'exam_id'=>$exam_id,
                    'grade'=>$grade,
                    'year_id'=>$groupYear->id
                ]);
                $grade->save();
            }
        }
        return redirect('admin/groupInfo/'.$group_id);
    }

    public function editGrades($group_id, $student_id){
        $student=Student::find($student_id);
        $group=Group::find($group_id);
        $course=$group->course_language;
        /*$grades=Grade::wherehas('student',function($q) use ($student){
            $q->where('id',$student->id);
        })->get()->pluck('grade','exam_id');*///a way to obtain an array of this student grades
        $exams= new Collection();
        $tmp=Grade::where(function($q) use($course,$student){
            $q->whereHas('student', function($q) use($student){
                $q->where('id',$student->id);
            })->whereHas('exam', function($q) use($course){
                $q->where('course_language_id',$course->id);
            });
        })->get();
        foreach($tmp as $grade){
            $grades[$grade->exam_id]=$grade->grade;
            $exams->push($grade->exam);
        }//all grades belonging to this student in this course along with their exams information
        return view('Admin.grades.editGrades', compact('grades','exams','student'));
    }

    public function updateGrades(Request $request, $student_id){
        $input=$request->all();
        foreach($input['grades'] as $exam_id=>$gradeint){
                $grade=Grade::where('exam_id',$exam_id)->where('student_id',$student_id)->first();
                $grade->student_id=$student_id;
                $grade->exam_id=$exam_id;
                $grade->grade=$gradeint;
                $grade->save();
        }
        return redirect('admin/groupsGrades');
    }

    public function editAttendance($group_id, $student_id){
        $student=Student::find($student_id);
        $group=Group::find($group_id);
        $att=Attendance::where(function($q) use($group_id,$student){
            $q->whereHas('student', function($q) use($student){
                $q->where('id',$student->id);
            })->whereHas('session', function($q) use($group_id){
                $q->where('group_id',$group_id);
            });
        })->get();
        return view('Admin.attendance.editAttendance',compact('att','student','group'));
    }

    public function updateAttendance(Request $request, $student_id, $group_id){
        $student=Student::find($student_id);
        $att=Attendance::where(function($q) use($group_id,$student){
            $q->whereHas('student', function($q) use($student){
                $q->where('id',$student->id);
            })->whereHas('session', function($q) use($group_id){
                $q->where('group_id',$group_id);
            });
        })->get();
        
        if(isset($request->attendanceid)){
            foreach($att as $a){
                if(in_array($a->id,$request->attendanceid)){
                    $attendanceToUpdate=Attendance::find($a->id);
                    $attendanceToUpdate->attended_int=1;
                    $attendanceToUpdate->save();
                }else{
                    $attendanceToUpdate=Attendance::find($a->id);
                    $attendanceToUpdate->attended_int=0;
                    $attendanceToUpdate->save();
                }
            }
        }else{
            foreach($att as $a){
                $attendanceToUpdate=Attendance::find($a->id);
                    $attendanceToUpdate->attended_int=0;
                    $attendanceToUpdate->save();
            }
        }
        return redirect('admin/groupInfo/'.$group_id);
    }
}
