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

                                @if($dare->medias->count())
                                <figure class="flex-video">
                                    @if($dare->medias->first()->source == 'yolo')
                                        <img src="{{$dare->medias->first()->media_url}}">
                                    @elseif($dare->medias->first()->source == 'youtube')
                                        <iframe src="//www.youtube.com/embed/{{Media::getYoutubeEmebbed($dare->medias->first()->media_meta)}}" frameborder="0" allowfullscreen></iframe>
                                    @endif
                                </figure>
                                @endif
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

                            <span class="dare-details__title milli">Insert your donation amount</span>
                            <input class="round-box large" type="text" value="$10" style="height: 60px;">
                            <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                            <input type="hidden" name="cmd" value="_s-xclick">
                            <input type="hidden" name="amount" value="100.00">
                            <input type="hidden" name="currency_code" value="USD">
                            <input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----
                            ">
                            <input style="width:100%" type="image" src="http://i.imgur.com/sFaZ2IN.png" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                            <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    @include('modals.challenge-friends')
    @include('modals.dare-post')
@show
