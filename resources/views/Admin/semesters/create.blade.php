 <!-- Bootstrap Core CSS -->
 <link href="{{asset('css/app.css')}}" rel="stylesheet">

 <link href="{{asset('css/libs.css')}}" rel="stylesheet">

<h1>ADD SEMETER</h1>
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
    {!! Form::label('Is_Session_one', 'Session') !!}
    {!! Form::select('Is_Session_one', array(1=>'first session', 0=>'second session',2=>'choose session'),2 , ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('academic_year', 'Academic year') !!}
    {!! Form::select('academic_year', array('First Year'=>'First Year', 'Second Year'=>'Second Year', 'Third Year'=>'Third Year', 'Master one'=>'Master one', 'Master two'=>'Master two', 5=>'choose one' ),5, ['class' => 'form-control']) !!}
</div>

{!! Form::submit('Add Semester', ['class' => 'btn btn-info']) !!}

{!! Form::close()!!}
@endsection
