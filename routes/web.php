<?php
use App\Course;

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
/*Route::get('/admin',function(){
    return view('Admin.index');
});*/

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('admin/students','AdminStudentsController');
Route::resource('admin/instructors','AdminInstructorsController');
Route::resource('admin/courses','AdminCoursesController');
Route::resource('admin/majors','AdminMajorsController');
Route::resource('admin/semesters','AdminSemestersController');
Route::resource('admin/groups','AdminGroupsController');

/*Route::get('/test', function(){
    $course=Course::find(1);
    echo $course->semester;
});*/
