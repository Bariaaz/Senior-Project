@extends('layouts.Admin')
@section('content')

<h3>Create Group Schedual:</h3><br>

{!! Form::open(['method' => 'POST', 'action'=> 'AdminSchedualsController@store']) !!}

<div class="form-group">
    {!! Form::label('day_of_week', 'Day of week') !!}
    {!! Form::select('day_of_week', array(''=>'choose a day')+ $weekdays,'', ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('starting_time', 'Starting time') !!}
    {!! Form::time('starting_time', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('ending_time', 'Ending time') !!}
    {!! Form::time('ending_time', null, ['class' => 'form-control']) !!}
</div>

{!! Form::submit('Add Schedual', ['class' => 'btn btn-info']) !!}

{!! Form::close()!!}
@endsection('content')
