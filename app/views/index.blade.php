@extends('layouts.master')

@section('title')
    <title>App Title</title>
@stop

@section('content')
    <div id="homepage-hero">
    	<div class="overlay"></div>
    	<img src="{{ asset('img/index/hero.gif') }}" alt="challengers unite!">
    	<div class="row">
    		<div class="large-12 columns">
    			<h2>We dare you, to do some good!</h2>
    		</div>
    	</div>
	</div>

	<div class="row">
		<div class="large-12 columns">
			<p>We dare you to dare your friends for the profit of Charities and the entertainment of the intertubes.</p>
		</div>
	</div>
	<div class="row">
		<div class="large-6 columns">
			Featured Charities
		</div>
		<div class="large-6 columns">
			Latest Dares
		</div>
	</div>
	<div class="row">
		<div class="large-12 columns">
			<h3>Check out your impact!</h3>
		</div>
	</div>
@stop
