@extends('layouts.Admin')
@section('content')
<h1>EDIT STUDENT</h1>
{!! Form::model($user,['method' => 'PATCH', 'action'=> ['AdminStudentsController@update',$user->id]]) !!}

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
    {!! Form::label('Foreign_fullname', 'Foreign Full Name') !!}
    {!! Form::text('student[Foreign_fullname]', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('Arabic_fullname', 'Arabic Full Name') !!}
    {!! Form::text('student[Arabic_fullname]', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('major_id', 'Major') !!}
    {!! Form::select('student[major_id]', $majors, old('student[major_id]',$user->major), ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('language', 'Language') !!}
    {!! Form::select('student[language_id]', $languages, old('student[language]',$user->language) ,['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('academic_year', 'Academic year') !!}
    {!! Form::select('student[academic_year]', array('First Year'=>'First Year', 'Second Year'=>'Second Year', 'Third Year'=>'Third Year', 'Master one'=>'Master one', 'Master two'=>'Master two' ),old('student[academic_year]',$user->academic_year), ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('branch', 'Branch') !!}
    {!! Form::select('student[branch]', array('Hadath'=>'Hadath', 'Fanar'=>'Fanar'),old('student[branch]',$user->branch) ,['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('has_L3_Course', 'Has Level3 Course') !!}
    {!! Form::select('student[has_L3_Course]', array(1=>'yes', 0=>'No'),old('student[has_L3_Course]',$user->has_L3_Course) ,['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('note', 'Note') !!}
    {!! Form::textarea('student[note]', null, ['class' => 'form-control']) !!}
</div>

{!! Form::submit('Update Student', ['class' => 'btn btn-info']) !!}

{!! Form::close()!!}<br>


{!! Form::open(['method' => 'Delete', 'action'=> ['AdminStudentsController@destroy',$user->id]]) !!}
{!! Form::submit('Delete Student', ['class' => 'btn btn-danger']) !!}

{!! Form::close()!!}

@endsection

