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

  <h2>Filter students By Major, Language and Course:</h2><br>
  {!! Form::open(['method' => 'GET', 'action'=> 'AdminStudentsController@index']) !!}
  <div style="display:flex">
    {!! Form::label('m', 'Major :') !!}
    <div style="flex:1">
        <div class="col-md-8">
        
        {!! Form::select('major', array(''=>'Major')+$majors,'', ['class' => 'form-control']) !!}
        </div>
    </div>
    {!! Form::label('l', 'Language :') !!}
    <div style="flex:1">
        
        <div class="col-md-8">
        {!! Form::select('lang', array(''=>'Language')+$languages,'', ['class' => 'form-control']) !!}
        </div>
    </div>
    {!! Form::label('l', 'Course :') !!}
    <div style="flex:1">
      <div class="col-md-8">
      
      {!! Form::select('course', array(''=>'Course')+$courses,'', ['class' => 'form-control']) !!}
      </div>
    </div>
    <div style="flex:1">
      {!! Form::submit('Filter', ['class' => 'btn btn-success']) !!}
      {!! Form::close()!!}
  </div>
  </div><br><br>







  
       <div class="container">          
          <table class="table">
            <thead>
              <tr>
                <th>Name</th>
                <th>Major</th>
                <th>File Number</th>
                <th>Academic Year</th>
                <th>Language</th>
                <th>Assign Courses</th>
                <th>Edit Assigned Courses</td>
              </tr>
            </thead>
            <tbody>
                @if($users)
                    @foreach($users as $user)
                        <tr>
                            <td><a href="{{route('students.edit',$user->id)}}">{{$user->student->Foreign_fullname}}</a></td>
                            <td>{{$user->student->major->name}}</td>
                            <td>{{$user->fileNumber}}</td>
                            <td>{{$user->student->academic_year}}
                            <td>{{$user->student->language->name}}</td>
                            <td><a href="{{url('admin/students/'.$user->student->id.'/assignCourses')}}">Assign Courses</a></td>
                            <td><a href="{{url('admin/students/'.$user->student->id.'/editAssignedCourses')}}">Edit Courses</a></td>
                        </tr>
                    @endforeach
                @endif    
            </tbody>
          </table>    
      </div>

      <div class="row">
        <div class="col-sm-6 col-sm-offset-5">
          @if($users)
            {{$users->appends(['major'=>$q1,'lang'=>$q2,'course'=>$q3])->links()}}
          @endif
        </div>
    </div>
@endsection


