@extends('layouts.email')

@section('title')
    <title>Somebody has completed your dare! | #YOLO for a Cause</title>
@stop

@section('content')
    <h2>Somebody has completed your dare!!!</h2>
    <h4>{{'[name_of_challenger]'}} has completed your dare and have chosen {{'[name_of_charity]'}} as the beneficiary.</h4>

    <p><a href="#">Share the great news!</a> Together we are making the world better, one dare at a time.</p>

@stop
