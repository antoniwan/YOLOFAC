@extends('layouts.master')

@section('title')
    <title>You already do crazy, use charity as your excuse with #YOLOFAC!</title>
@stop

@section('content')
    <main class="home">
        <header class="home__hero">
            <div class="row">
                <div class="small-12 column">
                    <div class="flag flag--bottom">
                        <div class="flag__img show-for-medium-up">
                            <div class="home__hero-img" role="presentation"></div>
                        </div>
                        <div class="flag__body">
                            <h1 class="home__hero-heading">You already do crazy,<b>use charity as your excuse!</b></h1>
                            <div class="home__hero-cta row collapse">
                                <div class="small-12 medium-8 column">
                                    <p>Supporting charities has never<br /> been this <b id="crazy-fun">refreshing, fun, interesting, edgy, weird, entertaining, viral, social</b></p>
                                </div>
                                <div class="small-12 medium-4 column">
                                    <a class="button radius small" href="{{URL::to('/dare/create')}}">Create a dare</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="row">
            <div class="medium-7 column">
                <h2 class="delta bold">Latest Dares</h2>

                <ul class="small-block-grid-1 medium-block-grid-2" data-equalizer>
                    @foreach($dares as $dare)
                    <li>
                        <article class="dare-widget">
                            <div data-equalizer-watch>
                                @if($dare->medias->count())
                                <figure class="flex-video" data-equalizer-watch>
                                    @if($dare->medias->first()->source == 'yolo')
                                        <img src="{{$dare->medias->first()->media_url}}">
                                    @elseif($dare->medias->first()->source == 'youtube')
                                        <iframe src="//www.youtube.com/embed/{{Media::getYoutubeEmebbed($dare->medias->first()->media_meta)}}" frameborder="0" allowfullscreen></iframe>
                                    @endif
                                </figure>
                                @endif

                                <p class="dare-widget__desc">{{ $dare->excerpt}}</p>
                            </div>

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

            <div class="medium-4 column last show-for-medium-up">
                <h2 class="epsilon bold">Staff Pick</h2>

                <article class="dare-widget">
                    <figure class="flex-video">
                        <iframe src="//www.youtube.com/embed/EdM_u5y5m5A" frameborder="0" allowfullscreen></iframe>
                    </figure>

                    <footer class="dare-widget__meta flag milli">
                        <div class="flag__img">
                            <img src="//placehold.it/50x50" alt="">
                        </div>
                        <div class="author flag__body">
                            <strong class="author__name">Waldemar Figueroa</strong>
                            <span class="author__location">Miami, FL</span>
                        </div>
                    </footer>
                </article>

                <p class="home__sidebar-promo-desc">Every week we choose our favorite dare response for your enjoyment.</p>

                <h2 class="epsilon bold">Featured Charities</h2>


                <ul class="home__sidebar-charities small-block-grid-3">
                    @foreach($charities as $charity)
                    <li><a href="charities/show/{{ $charity->id }}"><img class="expand" src="{{ $charity->media }}" alt="Charity logo"></a></li>
                    @endforeach
                </ul>

                <p class="home__sidebar-promo-desc">We are honored to do silly stuff for the benefit of the previous non-profit organizations.</p>


                </div>
            </div>

            </div>
        </div>
    </main>
@stop
