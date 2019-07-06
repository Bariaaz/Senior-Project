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
 <h2>{{$student->Foreign_fullname}} Attendance Records in {{$group->course_language->course->description}}</h2>
 {!! Form::open(['method' => 'POST', 'action'=> ['AdminAttendanceAndGradesController@updateAttendance',$student->id,$group->id]]) !!}           
 <table class="table">
   <thead>
     <tr>
       <th>Session Date</th>
       <th>Day of Week</th>
       <th>Present</th>
     </tr>
   </thead>
   <tbody>
       @if($att)
           @foreach($att as $a)
               <tr>
                   <td>{{$a->session->session_date}}</td>
                   <td>{{$a->session->day_of_week}}</td>
                   <td>
                     @if($a->attended_int==0) 
                       <div>{!! Form::checkbox('attendanceid[]', $a->id, false) !!}</div>
                     @else 
                       <div>{!! Form::checkbox('attendanceid[]', $a->id, true) !!}</div>
                    @endif
                   </td>
               </tr>
           @endforeach
       @endif 
       {!! Form::submit('update', ['class' => 'btn btn-info']) !!}   
   </tbody>
 </table>
</div>
<div>

{!! Form::close()!!}
</div>
</body>
</html>
@endsection('content')


