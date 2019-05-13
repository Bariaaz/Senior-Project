<?php

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

// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@login');
$this->post('logout', 'Auth\LoginController@logout')->name('logout');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset');


Route::get('admin/home','AdminController@show');//here should the admin panel layout be shown
//CRUD functionalities Routes 
Route::resource('admin/instructors','AdminInstructorsController');
Route::resource('admin/courses','AdminCoursesController');
Route::resource('admin/majors','AdminMajorsController');
Route::resource('admin/semesters','AdminSemestersController');
Route::resource('admin/groups','AdminGroupsController');
Route::resource('admin/students', 'AdminStudentsController');
Route::resource('admin/exams','AdminExamsController');

//Assigning Courses to Students Routes
Route::get('admin/students/{id}/assignCourses', 'AdminStudentsController@fetchCourses');
Route::post('admin/studentAssinedCourses/{id}', 'AdminStudentsController@saveCoursesAssigned');
Route::post('admin/updateStudentAssignedCourses/{id}','AdminStudentsController@updateAssignedCourses');
Route::get('admin/students/{id}/editAssignedCourses', 'AdminStudentsController@editAssignedCourses');


//Assigning courses to Instructors Routes
Route::get('admin/instructors/{id}/assignCourses', 'AdminInstructorsController@fetchCourses');
Route::post('admin/instructorAssinedCourses/{id}', 'AdminInstructorsController@saveCoursesAssigned');
Route::post('admin/updateInstructorAssignedCourses/{id}','AdminInstructorsController@updateAssignedCourses');
Route::get('admin/instructors/{id}/editAssignedCourses', 'AdminInstructorsController@editAssignedCourses');


//Assigning Students to Groups Routes
Route::get('admin/groups/{id}/assignStudents', 'AdminGroupsController@fetchStudents');
Route::get('admin/groups/{id}/editAssignedStudents', 'AdminGroupsController@editAssignedStudents');
Route::post('admin/groupAssignedStudents/{group_id}','AdminGroupsController@saveStudentsAssigned');
Route::post('admin/updateGroupAssignedStudents/{group_id}','AdminGroupsController@updateAssignedStudents');

//Assigning instructors to Groups Routes
Route::get('admin/groups/{id}/assignInstructors', 'AdminGroupsController@fetchInstructors');
Route::get('admin/groups/{id}/editAssignedInstructors', 'AdminGroupsController@editAssignedInstructors');
Route::post('admin/groupAssignedInstructors/{group_id}','AdminGroupsController@saveInstructorsAssigned');
Route::post('admin/updateGroupAssignedInstructors/{group_id}','AdminGroupsController@updateAssignedInstructors');

//Instructor Routes
Route::get('instructor/groups','InstructorController@groupsindex');
Route::get('groupInfo/{group_id}','InstructorController@showGroup');
//Instructor take Attendance Routes
Route::get('instructor/{group_id}/takeAttendance','InstructorController@takeAttendance');
Route::post('instructor/{group_id}/saveAttendance','InstructorController@saveAttendance');
//Instructor add edit grades Routes
Route::post('instructor/{group_id}/fillGrades','InstructorController@fillGrades');
Route::post('instructor/{group_id}/saveGrades','InstructorController@storeGrades');
Route::get('groupInfo/{group_id}/{student_id}/edit','InstructorController@editGrades');
Route::post('groupInfo/edit/{student_id}/updateGrades','InstructorController@updateGrades');

//Student Routes
Route::get('student','StudentController@fetchGradesAndAttendance');