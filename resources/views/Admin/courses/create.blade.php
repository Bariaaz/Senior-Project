@extends('layouts.Admin')
@section('content')
<h1>ADD Course</h1>
{!! Form::open(['method' => 'POST', 'action'=> 'AdminCoursesController@store']) !!}

<div class="form-group">
    {!! Form::label('course_code', 'Course code') !!}
    {!! Form::text('course_code', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('description', 'Course Description') !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('major_id', 'Major') !!}
    {!! Form::select('major_id', array(''=>'Choose a major') + $majors, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('semester_id', 'Semester') !!}
    {!! Form::select('semester_id', array(''=>'Choose a semester') + $semesters, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('label', 'Languages') !!}
</div>

<div>
    @foreach($languages as $id=>$name)
        <div class="form-group">
        {!! Form::label('language_id', $name) !!}
        {!! Form::checkbox('language_id[]', $id, false) !!}
        </div>
    @endforeach
</div>

{!! Form::submit('Add Course', ['class' => 'btn btn-info']) !!}

{!! Form::close()!!}
@endsection
