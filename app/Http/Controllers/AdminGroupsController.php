<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CourseLanguage;
use App\Group;
use App\Student;
use App\Instructor;

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
        $weekdays=[
            'Monday'=>'Monday',
            'Tuseday'=>'Tuseday',
            'Wednesday'=>'Wednesday',
            'Thursday'=>'Thursday',
            'Friday'=>'Friday',
            'Saturday'=>'Saturday'
        ];

        return view('Admin.groups.create', compact('courses','weekdays'));
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
        $weekdays=[
            'Monday'=>'Monday',
            'Tuseday'=>'Tuseday',
            'Wednesday'=>'Wednesday',
            'Thursday'=>'Thursday',
            'Friday'=>'Friday',
            'Saturday'=>'Saturday'
        ];
        return view('Admin.groups.edit', compact('courses','weekdays','group'));
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
        $students=Student::where(function($q) use($course,$group){
            $q->whereHas('courses', function($q) use($course){
                $q->where('course_language_id',$course->id);
            })->whereDoesntHave('groups', function($q) use($group){
                $q->where('course_language_id',$group->course_language_id);
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
        $instructors=Instructor::where(function($q) use($course,$group){
            $q->whereHas('courses', function($q) use($course){
                $q->where('course_language_id',$course->id);
            })->whereDoesntHave('groups', function($q) use($group){
                $q->where('group_id',$group->id);
            });
        })->get();
        return view('Admin.groups.assignInstructors',compact('instructors','group_id'));
    }

    public function saveInstructorsAssigned(Request $request, $group_id){
        $group=Group::find($group_id);
        foreach($request->id as $instructorId){
            $i=Student::find($instructorId);
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
}
