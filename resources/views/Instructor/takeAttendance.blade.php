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
    <h2>Session Info</h2>
    {!! Form::open(['method' => 'POST', 'action'=> ['InstructorController@saveAttendance',$group->id]]) !!}

    <div class="form-group">
        {!! Form::label('session_date', 'Session Date') !!}
        {!! Form::date('session_date', new \DateTime(), ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('day_of_week', 'Day of week') !!}
        {!! Form::select('day_of_week', array(''=>'choose a day')+ $weekdays, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('starting_time', 'Starting time') !!}
        {!! Form::time('starting_time', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('ending_time', 'Ending time') !!}
        {!! Form::time('ending_time', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('note', 'Note') !!}
        {!! Form::text('note', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="container">   
    <h2>Students Attendance check:</h2><br>       
    <table class="table">
      <thead>
        <tr>
          <th>Name</th>
          <th>Academic Year</th>
          <th>Present</th>
        </tr>
      </thead>
      <tbody>
          @if($students)
              @foreach($students as $student)
                  <tr>
                      <td>{{$student->Foreign_fullname}}</td>
                      <td>{{$student->academic_year}}</td>
                      <td>
                        <div class="form-group">
                          {!! Form::checkbox('students_id[]', $student->id, false) !!}
                        </div>
                      </td>
                  </tr>
              @endforeach
          @endif    
      </tbody>
    </table>
    {!! Form::submit('Submit', ['class' => 'btn btn-info']) !!}

    {!! Form::close()!!}
  </div>
  <div>
      @if(count($errors)>0)
      <div class="alert alert-danger">
          <ul>
              @foreach($errors->all() as $e)
                  <li>{{$e}}</li>
              @endforeach
          </ul>
      @endif    
  </div>
  </body>
  </html>
  
  
