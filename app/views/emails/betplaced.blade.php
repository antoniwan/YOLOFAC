@extends('layouts.email')

@section('title')
    <title>Your dare is now G2G! | #YOLO for a Cause</title>
@stop

@section('content')
    <h2>Hey {{'[name]'}}, your dare is now G2G!</h2>
    <strong>What now?</strong>
    <ul>
        <li><a href="#">'Invite' your friends</a> into doing it (challenge them!)</li>
        <li>Check out how many people have <a href="#">seen it</a></li>
        <li><a href="#">Chicken out of the dare</a>. We will refund you only 10% of the pledge, the rest goes to a charity of our pre-selection. Sorry.</li>
        <li><a href="#">Share</a> it! Maybe it goes 'viral' :P!</li>
    </ul>
@stop
