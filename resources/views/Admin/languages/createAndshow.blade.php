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
        <h2>ADD Language:</h2> 
  <div class="col-sm-6">
        {!! Form::open(['method' => 'POST', 'action'=> 'AdminLanguagesController@store']) !!}
        
        <div class="form-group">
            {!! Form::label('name', 'Language Name') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>
        
        {!! Form::submit('Add Language', ['class' => 'btn btn-info']) !!}
        
        {!! Form::close()!!}
    </div>        
  
    <div class="col-sm-6">          
        <table class="table">
            <thead>
            <tr>
                <th>Name</th>
            </tr>
            </thead>
            <tbody>
                @if($languages)
                    @foreach($languages as $m)
                        <tr>
                            <td>{{$m->name}}</td>
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

