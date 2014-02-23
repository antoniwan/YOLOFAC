@extends('layouts.email')

@section('title')
    <title>#YOLO for a Cause Thanks and Welcomes you</title>
@stop

@section('content')
    <h2>Hey {{ $name }}, thanks for joining #YOLOFAC</h2>
    <p>We know you're inclined to take bad decisions, why not do it for a good purpose by pledging to support a local charity every time you or a friend do a crazy stunt.</p>
    <strong>What now?</strong>
    <ul>
        <li><a href="#">Dare your friends</a> into doing something you've ever wanted</li>
        <li>Complete your <a href="#">profile</a></li>
        <li>Check out other <a href="#">dares</a></li>
        <li>Check out <a href="#">how much</a> our user-base have contributed to charities</li>
        <li><a href="#">Share</a> the great news and make your friends become part of this community for good</li>
    </ul>
@stop
