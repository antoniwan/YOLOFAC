@extends('layouts.master');

@section('content')
    <main class="dare-single page">
        <div class="row">
            <div class="small-12 medium-7 large-8 column">
                <div class="page__box--flat-bottom">
                    <header class="dare-single__header">
                        <div class="flag flag--top">
                            <div class="flag__img"><img src="{{ $dare->user->services->first()->service_picture }}" alt="" width="50" height="50"></div>
                            <div class="author flag__body">
                                <strong class="author__name">{{ $dare->user->name }}</strong>
                                <span class="author__location">Miami, FL</span>

                                <h2 class="dare-single__challenge">
                                    I pledge to donate
                                    <strong>${{ number_format($dare->donation_amount) }}</strong>
                                    @if($dare->donation_quantity == 1)
                                    for
                                    @else
                                    for each of the first {{ number_format($dare->donation_quantity) }} challengers that
                                    @endif
                                    <strong>{{ str_replace(array("."), "", strtolower($dare->title)) }}</strong>.
                                </h2>

                                <figure class="flex-video">

                                    @if($dare->medias->first()->source == 'yolo')
                                        <img src="{{$dare->medias->first()->media_url}}">
                                    @elseif($dare->medias->first()->source == 'youtube')
                                        <iframe src="//www.youtube.com/embed/{{Media::getYoutubeEmebbed($dare->medias->first()->media_meta)}}" frameborder="0" allowfullscreen></iframe>
                                    @endif
                                </figure>
                            </div>
                        </div>
                    </header>

                    <div class="dare-single__actions">
                        <ul class="small-block-grid-1 medium-block-grid-2">
                            <li>
                                <span class="dare-details__title">Money Donated</span>
                                <div class="round-box large">
                                    <b>${{$dare->getTotalRaised()}}</b>
                                </div>
                            </li>
                           <li>
                                <span class="dare-details__title">Dare Responses</span>
                                <div class="round-box large">
                                    @if($dare->responses()->where('accepted', 1)->count())

                                    <b>{{$dare->responses()->where('accepted', 1)->count()}}</b>
                                    <ul class="dare-details__donors">
                                        @foreach($dare->responses()->where('accepted', 1)->get() as $response)
                                            <li><img src="//placehold.it/30x30"></li>
                                        @endforeach
                                    </ul>
                                    @else
                                        <b>0</b>
                                    @endif
                                </div>
                            </li>
                        </ul>
                    </div>

                </div>

                <div class="dare-single__responses page__box">
                    <h2 class="page__header--dividing zeta">{{ ($dare->responses()->where('accepted', 1)->count())? 'Responses' : 'No Responses' }}</h2>

                    @if($dare->responses()->where('accepted', 1)->count())
                        <ul class="list-unstyled">
                            @foreach($dare->responses()->where('accepted', 1)->get() as $response)
                                <?php
                                    if(isset($response->user_id))
                                        $user = User::find($response->user_id);
                                ?>
                                <li class="flag flag--top">
                                    <div class="flag__img">
                                        <img src="{{ ($user)? $user->services->first()->service_picture : '//placehold.it/50x50' }}" alt="" width="50">

                                        <div class="legit-submissions__shares">
                                            <div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-width="100" data-layout="box_count" data-action="like" data-show-faces="false" data-share="true"></div>
                                        </div>
                                    </div>
                                    <div class="legit-submission flag__body">
                                        <span class="author"><b>{{ ($user)? $user->name: 'No Name' }}<b> <small>2d 3h ago</small></span>
                                        <p>{{$response->comments}}</p>

                                        <figure class="flex-video">
                                            <iframe src="//www.youtube.com/embed/{{Media::getYoutubeEmebbed($response->video_url)}}" frameborder="0" allowfullscreen></iframe>
                                        </figure>

                                        <footer class="legit-meta row">
                                            <div class="small-12 column">
                                                <span class="legit-meta__comments">Show Comments</span>
                                                    <div id="disqus_thread" style="color:black;"></div>
                                                    <script type="text/javascript">
                                                        /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
                                                        var disqus_shortname = 'yoloforacause'; // required: replace example with your forum shortname
                                                        var disqus_identifier = '{{$response->id}}';

                                                        /* * * DON'T EDIT BELOW THIS LINE * * */
                                                        (function() {
                                                            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                                                            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
                                                            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
                                                        })();
                                                    </script>
                                            </div>
                                        </footer>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>

            <div class="small-12 medium-5 large-4 column js-sticky">
                <div class="dare-details page__box">
                    <div class="dare-details__mod">
                        <a class="button radius expand" href="#modal-dare-post" data-reveal-id="modal-dare-post" data-reveal>
                            <strong>Post your dare video</strong> and make him pay!
                        </a>
                    </div>
                    <div class="dare-details__mod">
                        <a class="button radius expand" href="#modal-challenge-friends" data-reveal-id="modal-challenge-friends" data-reveal>
                            <strong>Dare a friend</strong> to DO IT!
                        </a>
                    </div>
                    <div class="dare-details__mod">
                        <span class="dare-details__title">Feeling charitable?</span>
                        <p>You can also donate to our sponsored cause here.</p>

                        <form class="dare-details__donate-cta">
                            <span class="dare-details__title milli">Insert your donation amount</span>
                            <input class="round-box large" type="text" value="$10">
                            <input class="button radius expand" type="submit" value="Donate Now">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    @include('modals.challenge-friends')
    @include('modals.dare-post')
@show
