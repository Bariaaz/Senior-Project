@extends('layouts.temp')
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
    {!! Form::label('semester_id', 'Semester') !!}
    {!! Form::select('semester_id', array(''=>'Choose a semester') + $semesters, ['class' => 'form-control']) !!}
</div>

<div>
    {!! Form::label('language', 'Languages available:') !!}
</div>
@foreach($languages as $l)
<div class="form-group">
        {!! Form::label('language', $l->name) !!}
        {!! Form::checkbox('language[]', $l->id, false) !!}
</div>
@endforeach
{!! Form::submit('Add Course', ['class' => 'btn btn-info']) !!}

{!! Form::close()!!}


@endsection