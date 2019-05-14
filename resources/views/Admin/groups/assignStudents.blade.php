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
  <h2>Students</h2>
  {!! Form::open(['method' => 'POST', 'action'=> ['AdminGroupsController@saveStudentsAssigned',$group_id]]) !!}           
  <table class="table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Language</th>
        <th>Major</th>
        <th>Academic Year</th>
        <th>#</th>
      </tr>
    </thead>
    <tbody>
        @if($students)
            @foreach($students as $student)
                <tr>
                    <td>{{$student->Foreign_fullname}}</td>
                    <td>{{$student->language->name}}</td>
                    <td>{{$student->major->name}}
                    <td>{{$student->academic_year}}</td>
                    <td>
                      <div class="form-group">
                        {!! Form::checkbox('id[]', $student->id, false) !!}
                      </div>
                    </td>
                </tr>
            @endforeach
        @endif 
        {!! Form::submit('Save', ['class' => 'btn btn-info']) !!}   
    </tbody>
  </table>
</div>
<div>

{!! Form::close()!!}
</div>
</body>
</html>


