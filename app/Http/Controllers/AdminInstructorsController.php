<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Major;
use Illuminate\Support\Facades\Input;
use App\Instructor;
use App\CourseLanguage;

class AdminInstructorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::where('role_id', 3)->get();
        
        return view('Admin.instructors.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $majors = Major::pluck('name', 'id')->all();
        
        return view('Admin.instructors.create', compact('majors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input=$request->all();
        $input['password']=bcrypt($request->password);
        $user=User::create([
            'username'=>Input::get('username'),
            'email'=>Input::get('email'),
            'fileNumber'=>Input::get('fileNumber'),
            'password'=>$input['password'],
            'phone_Number'=>Input::get('phone_Number'),
            'is_active'=>Input::get('is_active'),
            'role_id'=>3
        ]);

        $instructor=new Instructor([
            'fullname'=>Input::get('fullname'),
            'major_id'=>Input::get('major_id')
        ]);
        $user->instructor()->save($instructor);
        return redirect('/admin/instructors');
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
        $user = User::with(['instructor'])->find($id);
        $majors=Major::pluck('name', 'id')->all();
        return view('Admin.instructors.edit', compact('user','majors'));
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
        $input=$request->all();
        $input['password']=bcrypt($request->password);
        $user=User::find($id)->update(array(
            'username'=>Input::get('username'),
            'email'=>Input::get('email'),
            'fileNumber'=>Input::get('fileNumber'),
            'password'=>$input['password'],
            'phone_Number'=>Input::get('phone_Number'),
            'is_active'=>Input::get('is_active'),
            'role_id'=>3
        ));
        Instructor::where('user_id', $id)->first()->update(array(
            'fullname'=>$input['instructor']['fullname'],
            'major_id'=>$input['instructor']['major_id'],
        ));
        return redirect('/admin/instructors');
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

    public function fetchCourses($id){
        $s=Instructor::find($id);
        if($s->major_id==2){
            $courses=CourseLanguage::where(function($q) use($s,$id){
                $q->whereHas('course', function($q) use($s){
                    $q->where('major_id', 2);
                })->whereDoesntHave('instructors', function($q) use ($id){
                    $q->where('instructor_id', $id);
                });
            })->get();
        }else{
            $courses=CourseLanguage::where(function($q) use($s,$id){
                $q->whereHas('course', function($q) use($s){
                    $q->where('major_id', '!=' , 2);
                })->whereDoesntHave('instructors', function($q) use ($id){
                    $q->where('instructor_id', $id);
                });
            })->get();
        }
        
        return view('Admin.instructors.assignCourses',compact('courses','id'));
    }

    public function saveCoursesAssigned(Request $request,$instructor_id){
        $instructor=Instructor::find($instructor_id);
        foreach($request->id as $coursechoiceId){
            $courselanguage=CourseLanguage::find($coursechoiceId);
            $instructor->courses()->attach($courselanguage);
        }
        return redirect('admin/instructors');
        
    }

    public function editAssignedCourses($id){
        $instructor=Instructor::find($id);
        $courses=$instructor->courses;
        return view('Admin.instructors.editAssignedCourses', compact('courses','instructor'));
    }

    public function updateAssignedCourses(Request $request, $id){
        $instructor=Instructor::find($id);
        foreach($request->id as $coursechoiceId){
            $courselanguage=CourseLanguage::find($coursechoiceId);
            $instructor->courses()->detach($courselanguage);
        }
        return redirect('admin/instructors');
    }
}
