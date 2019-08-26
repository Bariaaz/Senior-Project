@extends('layouts.Admin')
@section('content')


<h1>EDIT Group</h1>
{!! Form::model($group,['method' => 'PATCH', 'action'=> ['AdminGroupsController@update',$group->id]]) !!}

<div class="form-group">
        {!! Form::label('name', 'Group name') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
    
    <div class="form-group">
        {!! Form::label('course_language_id', 'Course') !!}
        {!! Form::select('course_language_id', array('default'=>'Choose a course') + $courses, old('course_language_id',$group->course_language_id), ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('year_id', 'Academic Year') !!}
        {!! Form::select('year_id', array('default'=>'Choose The academic year') + $years, old('year_id',$group->year_id), ['class' => 'form-control']) !!}
    </div>
    
    {!! Form::submit('Update Group', ['class' => 'btn btn-info']) !!}
    
    {!! Form::close()!!}<br>
    {!! Form::open(['method' => 'Delete', 'action'=> ['AdminGroupsController@destroy',$group->id]]) !!}
    {!! Form::submit('Delete Group', ['class' => 'btn btn-danger']) !!}

    {!! Form::close()!!}
    @endsection('content')
