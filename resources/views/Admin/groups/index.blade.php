 <!-- Bootstrap Core CSS -->
 <link href="{{asset('css/app.css')}}" rel="stylesheet">

 <link href="{{asset('css/libs.css')}}" rel="stylesheet">

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
        <th>assign students</th>
        <th>Edit assigned students</th>
        <th>assign Instructors</th>
        <th>Edit assigned Instructors</th>
      </tr>
    </thead>
    <tbody>
        @if($groups)
            @foreach($groups as $group)
                <tr>
                    <td><a href="{{route('groups.edit',$group->id)}}">{{$group->name}}</a></td>
                    <td>{{$group->course_language->course->description}}</td>
                    <td>{{$group->course_language->language->name}}</td>
                    <td><a href="{{url('admin/groups/'.$group->id.'/assignStudents')}}">Assign Students</a></td>
                    <td><a href="{{url('admin/groups/'.$group->id.'/editAssignedStudents')}}">Edit Assigned students</a></td>
                    <td><a href="{{url('admin/groups/'.$group->id.'/assignInstructors')}}">Assign Instructors</a></td>
                    <td><a href="{{url('admin/groups/'.$group->id.'/editAssignedInstructors')}}">Edit Assigned Instructors</a></td>
                </tr>
            @endforeach
        @endif    
    </tbody>
  </table>
</div>

</body>
</html>
