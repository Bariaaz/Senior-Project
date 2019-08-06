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
          <h2>Years</h2>           
          <table class="table">
            <thead>
              <tr>
                <th>Name</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
                @if($years)
                    @foreach($years as $year)
                        <tr>
                            <td><a href="{{url('admin/years/'.$year->id.'/edit')}}">{{$year->year}}</a></td>
                            <td>{{$year->current_year==1 ? "Current Year": "Not Current"}}</td>
                        </tr>
                    @endforeach
                @endif    
            </tbody>
          </table>    
      </div>
      @endsection('content')


