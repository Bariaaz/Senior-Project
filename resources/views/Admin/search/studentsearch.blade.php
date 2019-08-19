@extends('layouts.Admin')
@section('content')
<!DOCTYPE html>
<?php use LU\Year;?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
</head>


<body>
	<div class="container">

		<h2>Search A Student By file number:</h2><br>
		{!! Form::open(['method' => 'GET', 'action'=> 'AdminSearchController@searchStudent']) !!}
		<div style="display:flex">

				{!! Form::label('label', 'File Number:') !!}
				<div style="flex:1">
						<div class="col-md-10">
						
						{!! Form::text('fn', null, ['class' => 'form-control']) !!}
						</div>
				</div>
				{!! Form::label('courses', 'Course :') !!}
				<div style="flex:1">
						<div class="col-md-8">
						
						{!! Form::select('course', array(''=>'course')+$courses,'', ['class' => 'form-control']) !!}
						</div>
				</div>
				<div style="flex:1">
						{!! Form::submit('search', ['class' => 'btn btn-success']) !!}
						{!! Form::close()!!}
				</div>
		</div><br>

		@if($user)
			<h2>Profile Info:</h2>
			<table class="table table-bordered">
					<tr>
							<th>Name</th>
							<th>Major</th>
							<th>File Number</th>
							<th>Academic Year</th>
							<th>Language</th>
					</tr>
					<tr>
                            <td>{{$user->student->Foreign_fullname}}</td>
                            <td>{{$user->student->major->name}}</td>
                            <td>{{$user->fileNumber}}</td>
                            <td>{{$user->student->academic_year}}
							<td>{{$user->student->language->name}}</td>
					</tr>
			</table>
		@endif<br><br>

		@if($attendances)
			<h2>Attendance Records:</h2>
			<table class="table table-bordered">
					<tr>
							<th>Course name</th>
							<th>Group name</th>
							<th>Year</th>
							<th>Session Date</th>
							<th>Attendance</th>
					</tr>
					@foreach($attendances as $a)
						<tr>
							<td>{{$a->session->group->course_language->course->course_code}}</td>
							<td>{{$a->session->group->name}}</td>
							<?php $year=Year::find($a->session->group->year_id);?>
							<td>{{$year->year}}</td>
							<td>{{$a->session->session_date}}</td>
							<td>{{$a->attended_int==1 ? "Present": "Absent"}}</td>
						</tr>
             		@endforeach   
			</table>
		@endif<br>

		@if($grades)
			<h2>Grades:</h2>
			<table class="table table-bordered">
				<tr>
					<th>Course Code</th>
					<th>Course description</th>
					<th>Semester</th>
					<th>Year</th>
					<th>Exam</th>
					<th>Date</th>
					<th>Grade</th>
				</tr>
			@foreach($grades as $grade)
				<tr>
					<td>{{$grade->exam->course_language->course->course_code}}</td>
					<td>{{$grade->exam->course_language->course->description}}</td>
					<td>{{$grade->exam->course_language->course->semester->display_name}}</td>
					<?php $year=Year::find($grade->year_id);?>
					<td>{{$year->year}}</td>
					<td>{{$grade->exam->name}}</td>
					<td>{{$grade->created_at}}</td>
					<td>{{$grade->grade}}</td>
				</tr>
			@endforeach
			</table>
		@endif  
			 
    </div>
</body>
</html>
@endsection('content')