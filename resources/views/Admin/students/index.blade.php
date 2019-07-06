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
  
       <div class="container">
          <h2>Students</h2>           
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
@endsection


