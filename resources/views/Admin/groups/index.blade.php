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
  <h2>Groups</h2>           
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Name</th>
        <th>Course</th>
        <th>language</th>
        <th>academic year</th>
        <th>Assign students</th>
        <th>Assigned students</th>
        <th>Assign Instructors</th>
        <th>Assigned Instructors</th>
        <th>Assign Scheduals</th>
        <th>Assigned Scheduals</th>
      </tr>
    </thead>
    <tbody>
        @if($groups)
            @foreach($groups as $group)
                <tr>
                    <td><a href="{{route('groups.edit',$group->id)}}">{{$group->name}}</a></td>
                    <td>{{$group->course_language->course->description}}</td>
                    <td>{{$group->course_language->language->name}}</td>
                    <td>{{$group->year->year}}</td>
                    <td><a href="{{url('admin/groups/'.$group->id.'/assignStudents')}}">Assign Students</a></td>
                    <td><a href="{{url('admin/groups/'.$group->id.'/editAssignedStudents')}}">Assigned students</a></td>
                    <td><a href="{{url('admin/groups/'.$group->id.'/assignInstructors')}}">Assign Instructors</a></td>
                    <td><a href="{{url('admin/groups/'.$group->id.'/editAssignedInstructors')}}">Assigned Instructors</a></td>
                    <td><a href="{{url('admin/groups/'.$group->id.'/assignScheduals')}}">Assign Scheduals</a></td>
                    <td><a href="{{url('admin/groups/'.$group->id.'/editAssignedScheduals')}}">Assigned Scheduals</a></td>
                </tr>
            @endforeach
        @endif    
    </tbody>
  </table>
</div>

</body>
</html>
@endsection('content')
