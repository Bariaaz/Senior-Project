@extends('layouts.Admin')
@section('content')

<h1>EDIT schedual</h1>

{!! Form::model($schedual,['method' => 'PATCH', 'action'=> ['AdminSchedualsController@update',$schedual->id]]) !!}


<div class="form-group">
    {!! Form::label('day_of_week', 'Day of week') !!}
    {!! Form::select('day_of_week', array(''=>'choose a day')+ $weekdays, old('day_of_week',$schedual->day_of_week), ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('starting_time', 'Starting time') !!}
    {!! Form::time('starting_time', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('ending_time', 'Ending time') !!}
    {!! Form::time('ending_time', null, ['class' => 'form-control']) !!}
</div>

{!! Form::submit('Update Schedual', ['class' => 'btn btn-info']) !!}

{!! Form::close()!!}
@endsection('content')
