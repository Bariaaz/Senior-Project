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
  
       <div class="container">
          <h2>Scheduals</h2>           
          <table class="table">
            <thead>
              <tr>
                <th>Day of Week</th>
                <th>Starting time</th>
                <th>ending time</th>
              </tr>
            </thead>
            <tbody>
                @if($scheduals)
                    @foreach($scheduals as $s)
                        <tr>
                            <td><a href="{{url('admin/scheduals/'.$s->id.'/edit')}}">{{$s->day_of_week}}</a></td>
                            <td>{{$s->starting_time}}</td>
                            <td>{{$s->ending_time}}</td>
                        </tr>
                    @endforeach
                @endif    
            </tbody>
          </table>    
      </div>
      @endsection('content')


