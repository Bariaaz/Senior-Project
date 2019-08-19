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
        <h1>ADD Major</h1> 
  <div class="col-sm-6">
        {!! Form::open(['method' => 'POST', 'action'=> 'AdminMajorsController@store']) !!}
        
        <div class="form-group">
            {!! Form::label('name', 'Major Name') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>
        
        <div class="form-group">
            {!! Form::label('display_name', 'Major Display Name') !!}
            {!! Form::text('display_name', null, ['class' => 'form-control']) !!}
        </div>
        
        {!! Form::submit('Add Major', ['class' => 'btn btn-info']) !!}
        
        {!! Form::close()!!}
        
    </div>        
  
    <div class="col-sm-6">          
        <table class="table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Display Name</th>
            </tr>
            </thead>
            <tbody>
                @if($majors)
                    @foreach($majors as $m)
                        <tr>
                            <td>{{$m->name}}</td>
                            <td>{{$m->display_name}}</td>
                        </tr>
                    @endforeach
                @endif  
    </div> 


    </tbody>
  </table>
</div>

</body>
</html>
@endsection('content')

