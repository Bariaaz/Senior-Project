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
  <div class="col-sm-6">
        {!! Form::open(['method' => 'POST', 'action'=> 'AdminSemestersController@store']) !!}
        
        <div class="form-group">
            {!! Form::label('name', 'Semester Name') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>
        
        <div class="form-group">
            {!! Form::label('display_name', 'Semester Display Name') !!}
            {!! Form::text('display_name', null, ['class' => 'form-control']) !!}
        </div>
        
        <div class="form-group">
            {!! Form::label('is_one_year_semester', 'Semester Type') !!}
            {!! Form::select('is_one_year_semester', array(1=>'one year long', 0=>'spring or fall',2=>'choose type'),2 , ['class' => 'form-control']) !!}
        </div>
        
        <div class="form-group">
            {!! Form::label('academic_year', 'Academic year') !!}
            {!! Form::select('academic_year', array('First Year'=>'First Year', 'Second Year'=>'Second Year', 'Third Year'=>'Third Year', 'Master one'=>'Master one', 'Master two'=>'Master two', 5=>'choose one' ),5, ['class' => 'form-control']) !!}
        </div>
        
        {!! Form::submit('Add Semester', ['class' => 'btn btn-info']) !!}
        
        {!! Form::close()!!}
    </div>        
  
    <div class="col-sm-6">          
        <table class="table">
            <thead>
            <tr>
                <th>Name</th>
                <th>type</th>
                <th>Academic Year</th>
            </tr>
            </thead>
            <tbody>
                @if($semesters)
                    @foreach($semesters as $s)
                        <tr>
                            <td>{{$s->display_name}}</td>
                            <td>{{$s->is_one_year_semester==1 ? 'Year' : 'spring/fall'}}</td>
                            <td>{{$s->academic_year}}
                        </tr>
                    @endforeach
                @endif  
    </div> 


    </tbody>
  </table>
</div>

</body>
</html>
