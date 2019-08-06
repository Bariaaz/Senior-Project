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
  <table class="table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Course</th>
        <th>language</th>
        <th>Year</th>
      </tr>
    </thead>
    <tbody>
        @if($groups)
            @foreach($groups as $group)
                <tr>
                    <td><a href="{{url('admin/groupInfo/'.$group->id)}}">{{$group->name}}</a></td>
                    <td>{{$group->course_language->course->description}}</td>
                    <td>{{$group->course_language->language->name}}</td>
                    <td>{{$group->year->year}}</td>
                </tr>
            @endforeach
        @endif    
    </tbody>
  </table>
</div>

</body>
</html>
@endsection('content')