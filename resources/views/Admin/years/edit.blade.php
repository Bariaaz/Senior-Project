@extends('layouts.Admin')
@section('content')

<h1>EDIT Year Status</h1>
{!! Form::model($year,['method' => 'PATCH', 'action'=> ['AdminYearsController@update',$year->id]]) !!}

<div class="form-group">
    {!! Form::label('year', 'Year') !!}
    {!! Form::text('year', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('current_year', 'Is current year') !!}
    {!! Form::select('current_year', array(0=>'No', 1=>'Yes'), old('current_year',$year->current_year),['class' => 'form-control']) !!}
</div>

{!! Form::submit('Update Status', ['class' => 'btn btn-info']) !!}

{!! Form::close()!!}
@endsection('content')