@extends('layouts.app')
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
  <h2>Hello {{$student->Foreign_fullname}} here where your shit is displayed</h2><br>         
  <table class="table">
    <thead>
      <tr>
        <th>Course Code</th>
        <th>Course description</th>
        <th>Semester</th>
        <th>Exam</th>
        <th>Date</th>
        <th>Grade</th>
      </tr>
    </thead>
    <tbody>
        @if($grades)
            @foreach($grades as $grade)
                <tr>
                    <td>{{$grade->exam->course_language->course->course_code}}</td>
                    <td>{{$grade->exam->course_language->course->description}}</td>
                    <td>{{$grade->exam->course_language->course->semester->display_name}}</td>
                    <td>{{$grade->exam->name}}</td>
                    <td>{{$grade->created_at}}</td>
                    <td>{{$grade->grade}}</td>
                </tr>
            @endforeach
        @endif   
        @if($languageGrade)
                <tr>
                    <td>{{$languageGrade->exam->course_language->course->course_code}}</td>
                    <td>{{$languageGrade->exam->course_language->course->description}}</td>
                    <td>{{$languageGrade->exam->course_language->course->semester->display_name}}</td>
                    <td></td>
                    <td>{{$languageGrade->created_at}}</td>
                    <td>{{$languageGrade->grade}}</td>
                </tr>
        @endif     
    </tbody>
  </table>
</div>

<div class="container"> 
    <h2>Attendance Records</h2><br>         
    <table class="table">
      <thead>
        <tr>
          <th>Course name</th>
          <th>Group name</th>
          <th>Session Date</th>
          <th>Attendance</th>
        </tr>
      </thead>
      <tbody>
          @if($attendances)
              @foreach($attendances as $a)
                  <tr>
                      <td>{{$a->session->group->course_language->course->course_code}}</td>
                      <td>{{$a->session->group->name}}</td>
                      <td>{{$a->session->session_date}}</td>
                      <td>{{$a->attended_int==1 ? "Present": "Absent"}}</td>
                  </tr>
              @endforeach
          @endif    
      </tbody>
    </table>
  </div>
  

</body>
</html>

@endsection