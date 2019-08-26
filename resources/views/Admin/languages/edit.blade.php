@extends('layouts.Admin')
@section('content')


<h1>EDIT Language</h1>
{!! Form::model($language,['method' => 'PATCH', 'action'=> ['AdminLanguagesController@update',$language->id]]) !!}

    <div class="form-group">
        {!! Form::label('name', 'Language name') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>

    {!! Form::submit('Update Language', ['class' => 'btn btn-info']) !!}
    
    {!! Form::close()!!}<br>
    {!! Form::open(['method' => 'Delete', 'action'=> ['AdminLanguagesController@destroy',$language->id]]) !!}
    {!! Form::submit('Delete Language', ['class' => 'btn btn-danger']) !!}

    {!! Form::close()!!}

    @endsection('content')
    