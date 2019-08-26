@extends('layouts.Admin')
@section('content')

<h1>EDIT semester</h1>

{!! Form::model($semester,['method' => 'PATCH', 'action'=> ['AdminSemestersController@update',$semester->id]]) !!}


<div class="form-group">
    {!! Form::label('name', 'Semester Name') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('display_name', 'Semester Display Name') !!}
    {!! Form::text('display_name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('is_active', 'Status') !!}
    {!! Form::select('is_active', array(0=>'spring or fall', 1=>'one year long'), old('is_one_year_semester',$semester->is_one_year_semester),['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('academic_year', 'Academic year') !!}
    {!! Form::select('academic_year', array('First Year'=>'First Year', 'Second Year'=>'Second Year', 'Third Year'=>'Third Year', 'Master one'=>'Master one', 'Master two'=>'Master two', 5=>'choose one' ), old('academic_year',$semester->academic_year), ['class' => 'form-control']) !!}
</div>


{!! Form::submit('Update Semester', ['class' => 'btn btn-info']) !!}

{!! Form::close()!!}<br>
{!! Form::open(['method' => 'Delete', 'action'=> ['AdminSemestersController@destroy',$semester->id]]) !!}
{!! Form::submit('Delete Semester', ['class' => 'btn btn-danger']) !!}

{!! Form::close()!!}
@endsection('content')
