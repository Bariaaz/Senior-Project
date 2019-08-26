@extends('layouts.Admin')
@section('content')
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
</head>


<body>
	<div class="container">

		<h2>Attendance report by Course:</h2><br>
		{!! Form::open(['method' => 'GET', 'action'=> 'AdminSearchController@attendanceReport']) !!}
        <div style="display:flex">
            
				{!! Form::label('courses', 'Course :') !!}
				<div style="flex:1">
						<div class="col-md-8">
						
						{!! Form::select('course', array(''=>'course')+$courses,'', ['class' => 'form-control']) !!}
						</div>
				</div>
				<div style="flex:1">
						{!! Form::submit('Attendance Report', ['class' => 'btn btn-success', 'name'=>'attend']) !!}
				</div>
                <div style="flex:1">
                    {!! Form::open(['method' => 'GET', 'action'=> 'AdminSearchController@attendanceReport']) !!}
                    {!! Form::submit('Grades Report', ['class' => 'btn btn-success', 'name'=>'grades']) !!}

                    {!! Form::close()!!}
                </div>
        </div><br>
        
        @if($all)
			<table class="table table-bordered">
					<tr>
							<th>student Name</th>
							<th>Group Name</th>
							<th>Group Total sessions</th>
                            <th>Student Sessions</th>
                            <th>Attended Sessions</th>
                    </tr>
                    @foreach($all as $name=>$arr1)
                        @foreach($arr1 as $gname=>$arr2)
                            <tr>
                                <td>{{$name}}</td>
                                <td>{{$gname}}</td>
                                <td>{{$arr2['totalSessions']}}</td>
                                <td>{{$arr2['studentSessions']}}</td>
                                <td>{{$arr2['totalattendance']}}</td>
                            </tr>  
                        @endforeach
                    @endforeach
            </table>
        @endif<br> 
        
    @if($allg)
        <table class="table table-bordered">
            <tr>
                <th>student Name</th>
                @foreach($exams as $exam)
                    
                    <th>{{$exam->name}}</th>
                    
                @endforeach
                <th>Total</th>
            </tr>

            @foreach($allg as $sname=>$arr1)
                    <tr>
                        <td>{{$sname}}</td>
                        @foreach($exams as $e)
                            @if(array_key_exists($e->name, $arr1))
                                <td>{{$arr1[$e->name]}}</td>
                            @else 
                                <td>{{-1}}</td>    
                            @endif
                        @endforeach
                        <td>{{$total[$sname]}}</td>
            @endforeach
        </table>
    @endif<br>  
@endsection                                            

		