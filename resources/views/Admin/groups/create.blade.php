@extends('layouts.Admin')
@section('content')

<h1>Create Group</h1>
{!! Form::open(['method' => 'POST', 'action'=> 'AdminGroupsController@store']) !!}

<div class="form-group">
    {!! Form::label('name', 'Group name') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('course_language_id', 'Course') !!}
    {!! Form::select('course_language_id', array('default'=>'Choose a course') + $courses, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('year_id', 'Academic Year') !!}
    {!! Form::select('year_id', array(''=>'Choose the academic year') + $years, ['class' => 'form-control']) !!}
</div>

{!! Form::submit('Add Group', ['class' => 'btn btn-info']) !!}

{!! Form::close()!!}

@endsection('content')
