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
  <h2>Instructors</h2>           
  <table class="table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Major</th>
        <th>email</th>
        <th>Assign Courses</th>
        <th>Edit Courses Assigned</th>
      </tr>
    </thead>
    <tbody>
        @if($users)
            @foreach($users as $user)
                <tr>
                    <td><a href="{{route('instructors.edit',$user->id)}}">{{$user->instructor->fullname}}</td>
                    <td>{{$user->instructor->major->name}}</td>
                    <td>{{$user->email}}</td>
                    <td><a href="{{url('admin/instructors/'.$user->instructor->id.'/assignCourses')}}">Assign Courses</a></td>
                    <td><a href="{{url('admin/instructors/'.$user->instructor->id.'/editAssignedCourses')}}">Edit Courses</a></td>
                </tr>
            @endforeach
        @endif    
    </tbody>
  </table>
</div>

</body>
</html>
