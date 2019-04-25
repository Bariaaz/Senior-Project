<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Major;
use App\Student;
use Illuminate\Support\Facades\Input;

class AdminStudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::where('role_id',2)->get();
        return view('Admin.students.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $majors=Major::pluck('name', 'id')->all();
        return view('Admin.students.create', compact('majors'));
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
            'role_id'=>2
        ]);

        $student=new Student([
            'Foreign_fullname'=>Input::get('Foreign_fullname'),
            'Arabic_fullname'=>Input::get('Arabic_fullname'),
            'language'=>Input::get('language'),
            'major_id'=>Input::get('major_id'),
            'academic_year'=>Input::get('academic_year'),
            'has_L3_Course'=>Input::get('has_L3_Course'),
            'note'=>Input::get('note'),
            'branch'=>Input::get('branch')
        ]);
        $user->student()->save($student);
        return redirect('/admin/students');

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
        $user = User::with(['student'])->find($id);
        $majors=Major::pluck('name', 'id')->all();
        return view('Admin.students.edit', compact('user','majors'));
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
            'role_id'=>2
        ));
        Student::where('user_id', $id)->first()->update(array(
            'Foreign_fullname'=>$input['student']['Foreign_fullname'],
            'Arabic_fullname'=>$input['student']['Arabic_fullname'],
            'language'=>$input['student']['language'],
            'major_id'=>$input['student']['major_id'],
            'academic_year'=>$input['student']['academic_year'],
            'has_L3_Course'=>$input['student']['has_L3_Course'],
            'note'=>$input['student']['note'],
            'branch'=>$input['student']['branch']
        ));
        return redirect('/admin/students');
        //var_dump($input);
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
}
