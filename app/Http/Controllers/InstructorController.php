<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;
use App\Group;
use App\Grade;
use App\Exam;
use App\Student;

class InstructorController extends Controller
{
    public function groupsindex(){
        if (Auth::check()){
            $instructor = Auth::user()->instructor;
            $groups=Group::whereHas('instructors', function($q) use ($instructor){
                $q->where('instructor_id',$instructor->id);
            })->get();
            return view('Instructor.groupsindex',compact('groups'));
        }else{
            echo "you should authenticate first";
        }
    }

    public function showGroup($group_id){
        $group=Group::find($group_id);
        $course=$group->course_language;
        $exams=Exam::where(function($q) use ($course){
            $q->wherehas('course_language', function($q) use($course){
                $q->where('id',$course->id);
            })->where('is_written_exam',0);
        })->get()->pluck('name', 'id')->toArray();
        $students=$group->students;
        return view('Instructor.showGroup', compact('group','students','exams'));
    }

    public function takeAttendance($group_id){
        return view('Instructor.takeAttendance');
    }

    public function fillGrades(Request $request,$group_id){
        $input=$request->all();
        $group=Group::find($group_id);
        $students=$group->students;
        $course=$group->course_language;
        $exam=Exam::find($request->exam);
        return view('Instructor.fillGrades',compact('students','exam','group_id'));
    }

    public function storeGrades(Request $request,$group_id){
        $input=$request->all();
        foreach($input['grades'] as $student_id=>$exams){
            foreach($exams as $exam_id=>$grade){
                $grade=Grade::create([
                    'student_id'=>$student_id,
                    'exam_id'=>$exam_id,
                    'grade'=>$grade,
                ]);
                $grade->save();
            }
        }
        return redirect('groupInfo/'.$group_id);

        /*var_dump($request->all());*/
    }

    public function editGrades($group_id, $student_id){
        $student=Student::find($student_id);
        $group=Group::find($group_id);
        $course=$group->course_language;
        /*$grades=Grade::wherehas('student',function($q) use ($student){
            $q->where('id',$student->id);
        })->get()->pluck('grade','exam_id');*///a way to obtain an array of this student grades
        $exams= new Collection();
        $tmp=$student->grades;
        foreach($tmp as $grade){
            $grades[$grade->exam_id]=$grade->grade;
            if($grade->exam->is_written_exam==0)
                $exams->push($grade->exam);
        }//all grades belonging to this student along with their exams information
        return view('Instructor.editGrades', compact('grades','exams','student'));
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
        return redirect('instructor/groups');
    }
    
}
