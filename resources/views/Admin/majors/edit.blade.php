@extends('layouts.Admin')
@section('content')

<h1>EDIT Major</h1>

{!! Form::model($major,['method' => 'PATCH', 'action'=> ['AdminMajorsController@update',$major->id]]) !!}


<div class="form-group">
    {!! Form::label('name', 'Major Name') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('display_name', 'Major Display Name') !!}
    {!! Form::text('display_name', null, ['class' => 'form-control']) !!}
</div>


{!! Form::submit('Update Major', ['class' => 'btn btn-info']) !!}

{!! Form::close()!!}<br>
{!! Form::open(['method' => 'Delete', 'action'=> ['AdminMajorsController@destroy',$major->id]]) !!}
{!! Form::submit('Delete Major', ['class' => 'btn btn-danger']) !!}

{!! Form::close()!!}
@endsection('content')
