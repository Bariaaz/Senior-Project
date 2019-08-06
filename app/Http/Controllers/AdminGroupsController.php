<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CourseLanguage;
use App\Group;
use App\Student;
use App\Instructor;
use App\Year;
use App\Schedual;

class AdminGroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups=Group::all();
        return view('Admin.groups.index', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $c=CourseLanguage::all();
        $courses=array();
        foreach($c as $course){
            $courses[$course->id]=$course->course->description.' '.$course->language->name;
        }
        $years=Year::pluck('year', 'id')->all();

        return view('Admin.groups.create', compact('courses','years'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $group=Group::create($request->all());
        $group->save();
        return redirect('admin/groups');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $c=CourseLanguage::all();
        $group=Group::find($id);
        $courses=array();
        foreach($c as $course){
            $courses[$course->id]=$course->course->description.' '.$course->language->name;
        }
       
        $years=Year::pluck('year', 'id')->all();

        return view('Admin.groups.edit', compact('courses','group','years'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $group=Group::find($id)->update($request->all());
        return redirect('admin/groups');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function fetchStudents($group_id){
        $group=Group::find($group_id);
        $course=$group->course_language;
        $year=$group->year;
        $students=Student::where(function($q) use($course,$group,$year){
            $q->whereHas('courses', function($q) use($course,$year){
                $q->where('course_language_id',$course->id)->where('year_id',$year->id);
            })->whereDoesntHave('groups', function($q) use($group,$year){
                $q->where('course_language_id',$group->course_language_id)->where('year_id',$year->id);
            });
        })->get();
        return view('Admin.groups.assignStudents',compact('students','group_id'));
    }

    public function saveStudentsAssigned(Request $request, $group_id){
        $group=Group::find($group_id);
        foreach($request->id as $student){
            $studentObject=Student::find($student);
            $group->students()->attach($studentObject,['is_active'=> 1]);
        }
        return redirect('admin/groups');
    }

    public function editAssignedStudents($group_id){
        $group=Group::find($group_id);
        $students=$group->students;
        return view('Admin.groups.editAssignedStudents',compact('students', 'group'));
    }

    public function updateAssignedStudents(Request $request, $group_id){
        $group=Group::find($group_id);
        foreach($request->id as $studentChoiceId){
            $student=Student::find($studentChoiceId);
            $group->students()->detach($student);
        }
        return redirect('admin/groups');
    }

    public function fetchInstructors($group_id){
        $group=Group::find($group_id);
        $course=$group->course_language;
        $year=$group->year;
        $instructors=Instructor::where(function($q) use($course,$group,$year){
            $q->whereHas('courses', function($q) use($course,$year){
                $q->where('course_language_id',$course->id)->where('year_id',$year->id);
            })->whereDoesntHave('groups', function($q) use($group){
                $q->where('group_id',$group->id);
            });
        })->get();
        return view('Admin.groups.assignInstructors',compact('instructors','group_id'));
    }

    public function saveInstructorsAssigned(Request $request, $group_id){
        $group=Group::find($group_id);
        foreach($request->id as $instructorId){
            $i=Instructor::find($instructorId);
            $group->instructors()->attach($i,['is_active'=> 1]);
        }
        return redirect('admin/groups');
    }

    public function editAssignedInstructors($group_id){
        $group=Group::find($group_id);
        $instructors=$group->instructors;
        return view('Admin.groups.editAssignedInstructors',compact('instructors', 'group'));
    }

    public function updateAssignedInstructors(Request $request, $group_id){
        $group=Group::find($group_id);
        foreach($request->id as $instructorChoiceId){
            $i=Instructor::find($instructorChoiceId);
            $group->instructors()->detach($i);
        }
        return redirect('admin/groups');
    }

    public function fetchscheduals($group_id){
        $scheduals=Schedual::where(function($q) use($group_id){
            $q->whereDoesntHave('groups', function($q) use($group_id){
                $q->where('group_id',$group_id);
            });
        })->get();
        return view('Admin.groups.assignScheduals',compact('scheduals','group_id'));
    }

    public function saveSchedualsAssigned(Request $request, $group_id){
        $group=Group::find($group_id);
        foreach($request->id as $sId){
            $i=Schedual::find($sId);
            $group->scheduals()->attach($i);
        }
        return redirect('admin/groups');
    }

    public function editAssignedScheduals($group_id){
        $group=Group::find($group_id);
        $scheduals=$group->scheduals;
        return view('Admin.groups.editAssignedScheduals',compact('scheduals', 'group'));
    }

    public function updateAssignedScheduals(Request $request, $group_id){
        $group=Group::find($group_id);
        foreach($request->id as $sId){
            $i=Instructor::find($sId);
            $group->scheduals()->detach($i);
        }
        return redirect('admin/groups');
    }

}
