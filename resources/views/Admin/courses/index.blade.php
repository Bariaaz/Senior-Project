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
        <th>Course Name</th>
        <th>Course Code</th>
        <th>Semester</th>
        <th>Academic Year</th>
      </tr>
    </thead>
    <tbody>
        @if($courses)
            @foreach($courses as $course)
                <tr>
                    <td>{{$course->description}}</a></td>
                    <td>{{$course->course_code}}</td>
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
