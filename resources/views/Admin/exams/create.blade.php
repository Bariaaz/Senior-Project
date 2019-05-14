 <!-- Bootstrap Core CSS -->
 <link href="{{asset('css/app.css')}}" rel="stylesheet">

 <link href="{{asset('css/libs.css')}}" rel="stylesheet">

<h1>Add Exam</h1>
{!! Form::open(['method' => 'POST', 'action'=> 'AdminExamsController@store']) !!}

<div class="form-group">
    {!! Form::label('name', 'Exam name') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('display_name', 'Exam Display name') !!}
    {!! Form::text('display_name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('course_language_id', 'Course') !!}
    {!! Form::select('course_language_id', array('default'=>'Choose a course') + $courses, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('max_grade', 'Exam maximum grade') !!}
    {!! Form::number('max_grade', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('exam_date', 'Exam Date') !!}
    {!! Form::date('exam_date', new \DateTime(), ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('is_written_exam', 'Is Written Exam') !!}
    {!! Form::select('is_written_exam', array(0=>'No', 1=>'Yes',2=>'choose an answer'),2 , ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('is_session_one', 'Session One Exam') !!}
    {!! Form::select('is_session_one', array(0=>'No', 1=>'Yes',2=>'choose an Answer'),2 , ['class' => 'form-control']) !!}
</div>

{!! Form::submit('Add Exam', ['class' => 'btn btn-info']) !!}

{!! Form::close()!!}
