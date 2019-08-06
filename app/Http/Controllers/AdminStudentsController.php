<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Major;
use App\Student;
use Illuminate\Support\Facades\Input;
use App\Language;
use App\CourseLanguage;
use App\Year;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Hash;

class AdminStudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $languages=Language::pluck('name', 'id')->all();
        $majors=Major::pluck('name', 'id')->all();
        $c=CourseLanguage::all();
        $courses=array();
        foreach($c as $course){
            $courses[$course->id]=$course->course->description.' '.$course->language->name;
        }
        $q1=$request->major;
        $q2=$request->lang;
        $q3=$request->course;

        if($request->has('major')||$request->has('lang')||$request->has('course')){
            if($request->major && !$request->lang && !$request->course){
                $users=User::where(function($q) use($request){
                    $q->whereHas('student',function($q) use($request){
                        $q->where('major_id',$request->major);
                    });
                })->paginate(1);
                return view('Admin.students.index', compact('users','languages','majors','courses','q1','q2','q3'));
            }
            if($request->lang && !$request->major && !$request->course){
                $users=User::where(function($q) use($request){
                    $q->whereHas('student',function($q) use($request){
                        $q->where('language_id',$request->lang);
                    });
                })->paginate(1);
                return view('Admin.students.index', compact('users','languages','majors','courses','q1','q2','q3'));
            }
            if(($request->course && !$request->major && !$request->lang)||($request->course && $request->lang && !$request->major)){
                $users=User::where(function($q) use($request){
                    $q->whereHas('student.courses', function($q) use($request){
                        $q->where('course_language_id',$request->course);
                    });
                })->paginate(1);
                //$users->appends(['index'=>$q]);
                return view('Admin.students.index', compact('users','languages','majors','courses','q1','q2','q3'));
            }
            if($request->major && $request->course && !$request->language){
                $users=User::where(function($q) use($request){
                    $q->whereHas('student.courses', function($q) use($request){
                        $q->where('course_language_id',$request->course);
                    })->whereHas('student',function($q) use($request){
                        $q->where('major_id',$request->major);
                    });
                })->paginate(1);
                return view('Admin.students.index', compact('users','languages','majors','courses','q1','q2','q3'));
            }
            if($request->major && $request->language && !$request->course){
                $users=User::where(function($q) use($request){
                    $q->whereHas('student',function($q) use($request){
                        $q->where('language_id',$request->lang)->where('major_id',$request->major);
                    });
                })->paginate(1);
                return view('Admin.students.index', compact('users','languages','majors','courses','q1','q2','q3'));
            }
            if($request->major && $request->language && $request->course){
                $users=User::where(function($q) use($request){
                    $q->whereHas('student.courses', function($q) use($request){
                        $q->where('course_language_id',$request->course);
                    })->whereHas('student',function($q) use($request){
                        $q->where('major_id',$request->major);
                    })->whereHas('student',function($q) use($request){
                        $q->where('language_id',$request->lang);
                    });
                })->paginate(1);
            }else
                $users=Null;
            
        }else
            $users=User::where('role_id',2)->paginate(1);
        return View::make('Admin.students.index', compact('users','languages','majors','courses','q1','q2','q3'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $languages=Language::pluck('name', 'id')->all();
        $majors=Major::pluck('name', 'id')->all();
        return view('Admin.students.create', compact('majors','languages'));
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
            'language_id'=>Input::get('language_id'),
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
        $languages=Language::pluck('name', 'id')->all();
        return view('Admin.students.edit', compact('user','majors','languages'));
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
        $pass=Hash::needsRehash($input['password']) ? Hash::make($input['password']) : $input['password'];
        $user=User::find($id)->update(array(
            'username'=>Input::get('username'),
            'email'=>Input::get('email'),
            'fileNumber'=>Input::get('fileNumber'),
            'password'=>$pass,
            'phone_Number'=>Input::get('phone_Number'),
            'is_active'=>Input::get('is_active'),
            'role_id'=>2
        ));
        Student::where('user_id', $id)->first()->update(array(
            'Foreign_fullname'=>$input['student']['Foreign_fullname'],
            'Arabic_fullname'=>$input['student']['Arabic_fullname'],
            'language_id'=>$input['student']['language_id'],
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

    public function fetchCourses($id){
        $s=Student::find($id);
        $year=Year::where('current_year',1)->first();
        $langMajor=Major::where('name','Language')->first();
        $courses=CourseLanguage::where(function($q) use($s,$id,$langMajor,$year){
            $q->whereHas('course', function($q) use($s,$langMajor){
                $q->where('major_id', $s->major_id)->orWhere('major_id',$langMajor->id);
            })->whereDoesntHave('students', function($q) use ($id,$year){
                $q->where('student_id', $id)->where('year_id',$year->id);
            });
        })->where('language_id', $s->language_id)->get();
       
        return view('Admin.students.assignCourses',compact('courses','id'));
    }

    public function saveCoursesAssigned(Request $request,$student_id){
        $student=Student::find($student_id);
        $currentyear=Year::where('current_year',1)->first();
        foreach($request->id as $coursechoiceId){
            $courselanguage=CourseLanguage::find($coursechoiceId);
            $student->courses()->attach($courselanguage, array('year_id'=>$currentyear->id));
        }
        return redirect('admin/students');
        
    }

    public function editAssignedCourses($id){
        $student=Student::find($id);
        $courses=$student->courses;
        return view('Admin.students.editAssignedCourses', compact('courses','student'));
    }

    public function updateAssignedCourses(Request $request, $id){
        $student=Student::find($id);
        foreach($request->id as $coursechoiceId){
            $courselanguage=CourseLanguage::find($coursechoiceId);
            $student->courses()->detach($courselanguage);
        }
        return redirect('admin/students');
    }
}
