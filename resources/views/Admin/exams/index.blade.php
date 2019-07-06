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
  <h2>Exams</h2>           
  <table class="table">
    <thead>
      <tr>
        <th>Exam</th>
        <th>Course</th>
        <th>Language</th>
        <th>Date</th>
      </tr>
    </thead>
    <tbody>
        @if($exams)
            @foreach($exams as $exam)
                <tr>
                    <td><a href="{{route('exams.edit',$exam->id)}}">{{$exam->name}}</a></td>
                    <td>{{$exam->course_language->course->description}}</td>
                    <td>{{$exam->course_language->language->name}}</td>
                    <td>{{$exam->exam_date}}
                </tr>
            @endforeach
        @endif    
    </tbody>
  </table>
</div>

</body>
</html>
@endsection('content')
