@extends('layouts.Admin')
@section('content')


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h3>{{$group->name}} Schedual(s)</h3>
  {!! Form::open(['method' => 'POST', 'action'=> ['AdminGroupsController@updateAssignedScheduals',$group->id]]) !!}           
  <table class="table">
    <thead>
      <tr>
        <th>Day</th>
        <th>From</th>
        <th>To</th>
        <th>#</th>
      </tr>
    </thead>
    <tbody>
        @if($scheduals)
            @foreach($scheduals as $s)
                <tr>
                    <td>{{$s->day_of_week}}</td>
                    <td>{{$s->starting_time}}</td>
                    <td>{{$s->ending_time}}</td>
                    <td>
                      <div class="form-group">
                        {!! Form::checkbox('id[]', $s->id, false) !!}
                      </div>
                    </td>
                </tr>
            @endforeach
        @endif 
        {!! Form::submit('detach Scheduals', ['class' => 'btn btn-info']) !!}   
    </tbody>
  </table>
</div>
<div>

{!! Form::close()!!}
</div>
</body>
</html>
@endsection('content')


