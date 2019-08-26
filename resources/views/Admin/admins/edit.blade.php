@extends('layouts.Admin')
@section('content')

<h1>EDIT Instructor</h1>
{!! Form::model($user,['method' => 'PATCH', 'action'=> ['AdminController@update',$user->id]]) !!}

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

{!! Form::submit('Update Admin', ['class' => 'btn btn-info']) !!}

{!! Form::close()!!}<br>
{!! Form::open(['method' => 'Delete', 'action'=> ['AdminController@destroy',$user->id]]) !!}
{!! Form::submit('Delete Admin', ['class' => 'btn btn-danger']) !!}

{!! Form::close()!!}

@endsection

