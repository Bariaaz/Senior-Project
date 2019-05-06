<?php
use App\Student;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//CRUD functionalities Routes 
Route::resource('admin/instructors','AdminInstructorsController');
Route::resource('admin/courses','AdminCoursesController');
Route::resource('admin/majors','AdminMajorsController');
Route::resource('admin/semesters','AdminSemestersController');
Route::resource('admin/groups','AdminGroupsController');
Route::resource('admin/students', 'AdminStudentsController');

//Assigning Courses to Students Routes
Route::get('admin/students/{id}/assignCourses', 'AdminStudentsController@fetchCourses');
Route::post('admin/studentAssinedCourses/{id}', 'AdminStudentsController@saveCoursesAssigned');
Route::post('admin/updateStudentAssignedCourses/{id}','AdminStudentsController@updateAssignedCourses');
Route::get('admin/students/{id}/editAssignedCourses', 'AdminStudentsController@editAssignedCourses');

//Assigning Students to Groups Routes
Route::get('admin/groups/{id}/assignStudents', 'AdminGroupsController@fetchStudents');
Route::get('admin/groups/{id}/editAssignedStudents', 'AdminGroupsController@editAssignedStudents');
Route::post('admin/groupAssignedStudents/{group_id}','AdminGroupsController@saveStudentsAssigned');
Route::post('admin/updateGroupAssignedStudents/{group_id}','AdminGroupsController@updateAssignedStudents');


/*Route::get('/test', function(){
    $s=Student::find(1);
    foreach($s->courses as $lcourse){
        echo"<lu>" 
         ."<li>".$lcourse->course->course_code."</li></lu>";    
    }
});*/
