@extends('layouts.temp')
@section('content')
<h1>ADD STUDENT</h1>
{!! Form::open(['method' => 'POST', 'action'=> 'AdminStudentsController@store']) !!}

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
    {!! Form::label('Foreign_fullname', 'Foreign Full Name') !!}
    {!! Form::text('Foreign_fullname', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('Arabic_fullname', 'Arabic Full Name') !!}
    {!! Form::text('Arabic_fullname', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('major_id', 'Major') !!}
    {!! Form::select('major_id', array(''=>'Choose a major') + $majors, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('language_id', 'Language') !!}
    {!! Form::select('language_id', array(''=>'Choose a language') + $languages ,['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('academic_year', 'Academic year') !!}
    {!! Form::select('academic_year', array('First Year'=>'First Year', 'Second Year'=>'Second Year', 'Third Year'=>'Third Year', 'Master one'=>'Master one', 'Master two'=>'Master two', 5=>'choose one' ),5, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('branch', 'Branch') !!}
    {!! Form::select('branch', array('Hadath'=>'Hadath', 'Fanar'=>'Fanar', 'nothing'=>'choose a branch'),'nothing' ,['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('has_L3_Course', 'Has Level3 Course') !!}
    {!! Form::select('has_L3_Course', array(1=>'yes', 0=>'No', 2=>'choose'),2 ,['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('note', 'Note') !!}
    {!! Form::textarea('note', null, ['class' => 'form-control']) !!}
</div>

{!! Form::submit('Add Student', ['class' => 'btn btn-info']) !!}

{!! Form::close()!!}
@endsection
