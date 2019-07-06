@extends('layouts.Admin')
@section('content')

<h1>EDIT Instructor</h1>
{!! Form::model($user,['method' => 'PATCH', 'action'=> ['AdminInstructorsController@update',$user->id]]) !!}

<div class="form-group">
    {!! Form::label('username', 'username') !!}
    {!! Form::text('username', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('email', 'Email Address') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('fileNumber', 'File Number') !!}
    {!! Form::text('fileNumber', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('password', 'Password') !!}
    {!! Form::password('password',['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('phone_Number', 'Phone Number') !!}
    {!! Form::text('phone_Number', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('is_active', 'Status') !!}
    {!! Form::select('is_active', array(0=>'Not Active', 1=>'Active'), old('is_active',$user->is_active),['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('fullname', 'Foreign Full Name') !!}
    {!! Form::text('instructor[fullname]', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('major_id', 'Major') !!}
    {!! Form::select('instructor[major_id]', $majors, old('student[major_id]',$user->major), ['class' => 'form-control']) !!}
</div>

{!! Form::submit('Update Instructor', ['class' => 'btn btn-info']) !!}

{!! Form::close()!!}
@endsection

