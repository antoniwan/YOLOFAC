@extends('layouts.email')

@section('title')
    <title>I DARE YOU! | #YOLO for a Cause</title>
@stop

@section('content')
    <h2>Someone has dared you!</h2>
    <p>Find out what's going on <a href="#{}?{{ $dare_id }}">here</a>.</p>
@stop
