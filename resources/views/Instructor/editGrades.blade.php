@extends('layouts.temp')
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
<div class="col-md-6" style="background-color:#fff">

    <table class="table table-hover">
   <thead>
      <tr>
        <th style="text-align: center">Student</th>
        @foreach($exams as $exam) 
            <th style="text-align: center">{{$exam->name}}</th>
        @endforeach
      </tr>
    </thead>
    <tbody>
     {!! Form::open(['method' => 'Post', 'action'=> ['InstructorController@updateGrades',$student->id]]) !!}
        <tr>
            <td>{{$student->Foreign_fullname}}</td>
            @foreach($exams as $exam)
            <td>{!! Form::text('grades['.$exam->id.']' ,$grades[$exam->id]  ,  ['class'=>'form-control'])  !!}</td>
            @endforeach
        </tr>

     <td colspan="3">
     {!! Form::submit('SAVE', ['class'=>'btn btn-primary btn-block']) !!}
      {!! Form::close() !!}
      </td>
      </tr>
    </tbody>
  </table>

  </div>
</body>
</html>
@endsection