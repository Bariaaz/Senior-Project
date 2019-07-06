@extends('layouts.Admin')
@section('content')

<h1>ADD Instructor</h1>
{!! Form::open(['method' => 'POST', 'action'=> 'AdminInstructorsController@store']) !!}

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
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('phone_Number', 'Phone Number') !!}
    {!! Form::text('phone_Number', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('is_active', 'Status') !!}
    {!! Form::select('is_active', array(0=>'Not Active', 1=>'Active',2=>'choose status'),2 , ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('fullname', 'FullName') !!}
    {!! Form::text('fullname', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('major_id', 'Major') !!}
    {!! Form::select('major_id', array(''=>'Choose a major') + $majors, ['class' => 'form-control']) !!}
</div>

{!! Form::submit('Add', ['class' => 'btn btn-info']) !!}

{!! Form::close()!!}
@endsection
