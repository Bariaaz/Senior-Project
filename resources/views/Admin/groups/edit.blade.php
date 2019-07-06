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
    
    <div>
        <h3>Group Schedual:</h3><br>
    </div>
    
    <div class="form-group">
        {!! Form::label('day_of_week', 'Day of week') !!}
        {!! Form::select('day_of_week', array(''=>'choose a day')+ $weekdays, old('day_of_week',$group->day_of_week), ['class' => 'form-control']) !!}
    </div>
    
    <div class="form-group">
        {!! Form::label('starting_time', 'Starting time') !!}
        {!! Form::time('starting_time', null, ['class' => 'form-control']) !!}
    </div>
    
    <div class="form-group">
        {!! Form::label('ending_time', 'Ending time') !!}
        {!! Form::time('ending_time', null, ['class' => 'form-control']) !!}
    </div>
    
    {!! Form::submit('Update Group', ['class' => 'btn btn-info']) !!}
    
    {!! Form::close()!!}
    @endsection('content')
