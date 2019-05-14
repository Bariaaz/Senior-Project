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
<div class="well">   
    <h2>Group info :</h2>
    <h3>
        Name: {{$group->name}}<br><br>
        Course: {{$group->course_language->course->description.' '.$group->course_language->language->name}}<br><br>
    </h3>
        {!! Form::open(['method' => 'POST', 'action'=> ['InstructorController@fillGrades',$group->id]]) !!}
        <div class="form-group">
          {!! Form::label('exam', 'Exam') !!}
          {!! Form::select('exam', array(''=>'Choose an Exam') + $exams, ['class' => 'form-control']) !!}
          {!! Form::submit('Fill Grades', ['class' => 'btn btn-info']) !!}
          {!! Form::close()!!}
        </div>      
</div> 
</div>
<div class="container">
  
  <h2>Group Students :</h2><br>
        <table class="table">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Major</th>
                    <th>File Number</th>
                    <th>Academic Year</th>
                    <th>Language</th>
                    <th>edit Grades</th>
                  </tr>
                </thead>
                <tbody>
                    @if($students)
                        @foreach($students as $student)
                            <tr>
                                <td>{{$student->Foreign_fullname}}</td>
                                <td>{{$student->major->name}}</td>
                                <td>{{$student->user->fileNumber}}</td>
                                <td>{{$student->academic_year}}
                                <td>{{$student->language->name}}</td>
                                <td><a href="{{url('groupInfo/'.$group->id.'/'.$student->id.'/edit')}}">Edit Grades</a></td>
                            </tr>
                        @endforeach
                    @endif    
                </tbody>
        </table>
</div>

