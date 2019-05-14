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
  <h2>Courses</h2>           
  <table class="table">
    <thead>
      <tr>
        <th>Course Code</th>
        <th>Course description</th>
        <th>Semester</th>
        <th>Academic Year</th>
      </tr>
    </thead>
    <tbody>
        @if($courses)
            @foreach($courses as $course)
                <tr>
                    <td><a href="{{route('courses.edit',$course->id)}}">{{$course->course_code}}</a></td>
                    <td>{{$course->description}}</td>
                    <td>{{$course->semester->display_name}}</td>
                    <td>{{$course->semester->academic_year}}
                </tr>
            @endforeach
        @endif    
    </tbody>
  </table>
</div>

</body>
</html>
