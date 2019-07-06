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
  <h3>{{$instructor->fullname}} Courses</h3>
  {!! Form::open(['method' => 'POST', 'action'=> ['AdminInstructorsController@updateAssignedCourses',$instructor->id]]) !!}           
  <table class="table">
    <thead>
      <tr>
        <th>Course Code</th>
        <th>Course description</th>
        <th>Semester</th>
        <th>Academic Year</th>
        <th>#</th>
      </tr>
    </thead>
    <tbody>
        @if($courses)
            @foreach($courses as $course)
                <tr>
                    <td>{{$course->course->course_code}}</td>
                    <td>{{$course->course->description}}</td>
                    <td>{{$course->language->name}}</td>
                    <td>{{$course->course->semester->display_name}}</td>
                    <td>{{$course->course->semester->academic_year}}</td>
                    <td>
                      <div class="form-group">
                        {!! Form::checkbox('id[]', $course->id, false) !!}
                      </div>
                    </td>
                </tr>
            @endforeach
        @endif 
        {!! Form::submit('detach courses', ['class' => 'btn btn-info']) !!}   
    </tbody>
  </table>
</div>
<div>

{!! Form::close()!!}
</div>
</body>
</html>
@endsection


