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
  <h2>Instructors Available</h2>
  {!! Form::open(['method' => 'POST', 'action'=> ['AdminGroupsController@saveInstructorsAssigned',$group_id]]) !!}           
  <table class="table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Major</th>
        <th>#</th>
      </tr>
    </thead>
    <tbody>
        @if($instructors)
            @foreach($instructors as $i)
                <tr>
                    <td>{{$i->fullname}}</td>
                    <td>{{$i->major->name}}</td>
                    <td>
                      <div class="form-group">
                        {!! Form::checkbox('id[]', $i->id, false) !!}
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


