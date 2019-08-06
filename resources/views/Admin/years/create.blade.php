@extends('layouts.Admin')
@section('content')
<h1>ADD A Year</h1>
{!! Form::open(['method' => 'POST', 'action'=> 'AdminYearsController@store']) !!}

<div class="form-group">
    {!! Form::label('year', 'Year') !!}
    {!! Form::text('year', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('current_year', 'Is it current year') !!}
    {!! Form::select('current_year', array(0=>'No', 1=>'Yes'),1 , ['class' => 'form-control']) !!}
</div>

{!! Form::submit('Add Year', ['class' => 'btn btn-info']) !!}

{!! Form::close()!!}
@endsection('content')
