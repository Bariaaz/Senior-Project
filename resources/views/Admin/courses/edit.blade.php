@extends('layouts.Admin')
@section('content')
<h1>EDIT Course</h1>
{!! Form::model($course,['method' => 'PATCH', 'action'=> ['AdminCoursesController@update',$course->id]]) !!}

<div class="form-group">
    {!! Form::label('course_code', 'Course Code') !!}
    {!! Form::text('course_code', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('description', 'Course Description') !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('major_id', 'Major') !!}
    {!! Form::select('major_id', $majors, old('major_id',$course->major_id), ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('semester_id', 'Semester') !!}
    {!! Form::select('semester_id', $semesters, old('semester_id',$course->semester_id), ['class' => 'form-control']) !!}
</div>

{!! Form::submit('Update Course', ['class' => 'btn btn-info']) !!}

{!! Form::close()!!}
@endsection