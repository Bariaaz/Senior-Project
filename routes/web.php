<?php
use Illuminate\Support\Facades\View;

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
/*$this->post('logout', 'Auth\LoginController@logout')->name('logout');*/
Route::get('logout', function (){
    Auth::logout();
    return redirect('/');
})->name('logout');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset');



//Admin Routes
Route::group(['middleware'=>'admin'], function(){
    //CRUD functionalities Routes 
    Route::resource('admin/instructors','AdminInstructorsController');
    Route::resource('admin/courses','AdminCoursesController');
    Route::resource('admin/semesters','AdminSemestersController');
    Route::resource('admin/groups','AdminGroupsController');
    Route::resource('admin/exams','AdminExamsController');
    Route::resource('admin/students', 'AdminStudentsController');
    

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
    
    //Assigning Scheduals to Groups
    Route::get('admin/groups/{id}/assignScheduals', 'AdminGroupsController@fetchscheduals');
    Route::post('admin/groupAssignedScheduals/{group_id}','AdminGroupsController@saveSchedualsAssigned');
    Route::get('admin/groups/{id}/editAssignedScheduals', 'AdminGroupsController@editAssignedScheduals');
    Route::post('admin/updateGroupAssignedScheduals/{group_id}','AdminGroupsController@updateAssignedScheduals');
    
    
    
    //Admin add edit grades/attendance Routes
    Route::post('admin/{group_id}/fillGrades','AdminAttendanceAndGradesController@fillGrades');
    Route::post('admin/{group_id}/saveGrades','AdminAttendanceAndGradesController@storeGrades');
    Route::get('admin/groupInfo/{group_id}/{student_id}/edit','AdminAttendanceAndGradesController@editGrades');
    Route::post('admin/groupInfo/edit/{student_id}/updateGrades','AdminAttendanceAndGradesController@updateGrades');
    Route::get('admin/groupsGrades','AdminAttendanceAndGradesController@listGroups');
    Route::get('admin/groupInfo/{group_id}','AdminAttendanceAndGradesController@showGroup');
    Route::get('admin/groupInfo/{group_id}/{student_id}/editAttendance','AdminAttendanceAndGradesController@editAttendance');
    Route::post('admin/groupInfo/edit/{student_id}/{group_id}/updateAttendance','AdminAttendanceAndGradesController@updateAttendance');

    //year routes
    Route::get('admin/years','AdminYearsController@index');
    Route::get('admin/years/create','AdminYearsController@create');
    Route::post('admin/years','AdminYearsController@store');
    Route::get('admin/years/{year_object}/edit','AdminYearsController@edit');
    Route::PATCH('admin/year/{year_id}','AdminYearsController@update');

    //Admins routes
    Route::get('admin/admins','AdminController@index');
    Route::get('admin/admins/create','AdminController@create');
    Route::post('admin/admins','AdminController@store');
    Route::get('admin/admins/{id}/edit','AdminController@edit');
    Route::PATCH('admin/admins/{id}','AdminController@update');

    //Scheduals Routes
    Route::get('admin/scheduals','AdminSchedualsController@index');
    Route::get('admin/scheduals/create','AdminSchedualsController@create');
    Route::post('admin/scheduals','AdminSchedualsController@store');
    Route::get('admin/scheduals/{schedual_object}/edit','AdminSchedualsController@edit');
    Route::PATCH('admin/scheduals/{s_id}','AdminSchedualsController@update');


    //Majors Routes 
    Route::get('admin/majors', 'AdminMajorsController@indexAndCreate');
    Route::post('admin/majors', 'AdminMajorsController@store');
    Route::get('admin/majors/{major}/edit', 'AdminMajorsController@edit');
    Route::get('admin/majors/{major_id}', 'AdminMajorsController@update');

    //Languages Routes 
    Route::get('admin/languages', 'AdminLanguagesController@indexAndCreate');
    Route::post('admin/languages', 'AdminLanguagesController@store');
    Route::get('admin/languages/{languages}/edit', 'AdminLanguagesController@edit');
    Route::get('admin/languages/{languages_id}', 'AdminLanguagesController@update');

    //search Routes
    Route::get('admin/studentSearch', 'AdminSearchController@searchStudent');



    Route::get('admin',function(){
        return view('Admin.index');
    });


});

//Instructor Section
Route::group(['middleware'=>'instructor'], function(){
    //Instructor Routes
    Route::get('instructor/groups','InstructorController@groupsindex');
    Route::get('groupInfo/{group_id}','InstructorController@showGroup');
    //Instructor take edit Attendance Routes
    Route::get('instructor/{group_id}/takeAttendance','InstructorController@takeAttendance');
    Route::post('instructor/{group_id}/saveAttendance','InstructorController@saveAttendance');
    Route::get('groupInfo/{group_id}/{student_id}/editAttendance','InstructorController@editAttendance');
    Route::post('groupInfo/edit/{student_id}/{group_id}/updateAttendance','InstructorController@updateAttendance');
    //Instructor add edit grades Routes
    Route::post('instructor/{group_id}/fillGrades','InstructorController@fillGrades');
    Route::post('instructor/{group_id}/saveGrades','InstructorController@storeGrades');
    Route::get('groupInfo/{group_id}/{student_id}/edit','InstructorController@editGrades');
    Route::post('groupInfo/edit/{student_id}/{group_id}/updateGrades','InstructorController@updateGrades');
});

//Student Pages
Route::group(['middleware'=> 'student'], function(){
    //Student Routes
    Route::get('student','StudentController@fetchGradesAndAttendance');
});









