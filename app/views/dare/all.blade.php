@extends('layouts.master')

@section('title')
    <title>You already do crazy, use charity as your excuse with #YOLOFAC!</title>
@stop

@section('content')
    <main class="home">

        <header class="sub__hero">
            <div class="row">
                <div class="small-12 column">
                    <h1 class="sub__hero-heading">Dares</h1>
                </div>
            </div>
        </header>

        <div class="row">
            <div class="medium-12 column">

                <ul class="small-block-grid-1 medium-block-grid-2">

                    @foreach($dares as $dare)
                    <li>
                        <article class="dare-widget">
                            @if($dare->medias->count())
                            <figure class="flex-video">
                                @if($dare->medias->first()->source == 'yolo')
                                    <img src="{{$dare->medias->first()->media_url}}">
                                @elseif($dare->medias->first()->source == 'youtube')
                                    <iframe src="//www.youtube.com/embed/{{Media::getYoutubeEmebbed($dare->medias->first()->media_meta)}}" frameborder="0" allowfullscreen></iframe>
                                @endif
                            </figure>
                            @endif

                            <p class="dare-widget__desc">{{ $dare->excerpt}}</p>

                            <footer class="dare-widget__meta flag flag--inverted nano">
                                <div class="flag__body">
                                    <span><b>${{$dare->getTotalRaised()}}</b> Donated</span>
                                    <span><b>{{$dare->responses->count()}}</b> Responses</span>
                                </div>
                                <div class="flag__img">
                                    <img src="{{$dare->user->services->first()->service_picture}}" alt="" width="50">
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
