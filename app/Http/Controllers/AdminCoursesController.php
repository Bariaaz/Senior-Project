<?php

namespace LU\Http\Controllers;

use Illuminate\Http\Request;
use LU\Semester;
use LU\Course;
use LU\Language;
use LU\Major;
use LU\Http\Requests\CreateCourseRequest;

class AdminCoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses=Course::all();
        return view('Admin.courses.index',compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $majors=Major::pluck('name', 'id')->all();
        $semesters=Semester::pluck('display_name', 'id')->all();
        $languages=Language::pluck('name','id')->all();
        return view('Admin.courses.create', compact('semesters','languages','majors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCourseRequest $request)
    {
        $course=new Course;
        $course->course_code=$request->course_code;
        $course->semester_id=$request->semester_id;
        $course->major_id=$request->major_id;
        $course->description=$request->description;
        $course->save();

        foreach($request->language_id as $id){
            $lang=Language::find($id);
            $course->languages()->attach($lang);
        }
        return redirect('admin/courses');
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
        $course=Course::find($id);
        $majors=Major::pluck('name', 'id')->all();
        $semesters=Semester::pluck('display_name', 'id')->all();
        return view('Admin.courses.edit', compact('semesters','majors','course'));
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
        $course=Course::find($id)->update($request->all());
        return redirect('admin/courses');
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
