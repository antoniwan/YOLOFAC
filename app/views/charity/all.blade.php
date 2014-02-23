@extends('layouts.master')

@section('title')
    <title>You already do crazy, use charity as your excuse with #YOLOFAC!</title>
@stop

@section('content')
    <main class="home">

        <header class="sub__hero">
            <div class="row">
                <div class="small-12 column">
                    <h1 class="sub__hero-heading">Charities</h1>
                </div>
            </div>
        </header>

        <div class="row">
            <div class="medium-12 column">

                <ul class="small-block-grid-1 medium-block-grid-2">
                    @foreach($charities as $charity)
                    <li>
                        <article class="dare-widget">
                            <h2><a href="charities/show/{{ $charity->id }}">{{ $charity->name }}</a></h2>
                            <p class="dare-widget__desc">{{ $charity->mission}}</p>

                            <footer class="dare-widget__meta flag flag--inverted nano">
                                <div class="flag__body">
                                    <span><b>$0</b> Donated</span>
                                    <span><b>0</b> Responses</span>
                                </div>
                                <div class="flag__img">
                                    <img src="{{ $charity->media }}" alt="" width="50">
                                </div>
                            </footer>
                        </article>
                    </li>
                    @endforeach
                </ul>
            </div>


            </div>
        </div>
    </main>
@stop
