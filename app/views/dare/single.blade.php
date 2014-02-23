@extends('layouts.master');

@section('content')
    <main class="dare-single page">
        <div class="row">
            <div class="small-12 medium-7 large-8 column">
                <div class="page__box--flat-bottom">
                    <header class="dare-single__header">
                        <div class="flag flag--top">
                            <div class="flag__img"><img src="{{ $dare['user']['service']->service_picture }}" alt="" width="50" height="50"></div>
                            <div class="author flag__body">
                                <strong class="author__name">{{ $dare['user']->name }}</strong>
                                <span class="author__location">Miami, FL</span>

                                <h2 class="dare-single__challenge">
                                    I pledge to donate
                                    <strong>${{ number_format($dare->donation_amount) }}</strong>
                                    @if($dare->donation_quantity == 1)
                                    for
                                    @else
                                    for each of the first {{ number_format($dare->donation_quantity) }} challengers that
                                    @endif
                                    <strong>{{ str_replace(array("."), "", strtolower($dare->title)) }}</strong>
                                    to <strong>[charity name]</strong>.
                                </h2>

                                <figure class="flex-video">
                                    <iframe src="//www.youtube.com/embed/EdM_u5y5m5A" frameborder="0" allowfullscreen></iframe>
                                </figure>
                            </div>
                        </div>
                    </header>

                    <ul class="dare-single__actions small-block-grid-2">
                        <li>
                            <span class="dare-details__title">Money Donated</span>
                            <div class="round-box large">
                                <b>$200</b>
                            </div>
                        </li>
                       <li>
                            <span class="dare-details__title">Dare Responses</span>
                            <div class="round-box large">
                                <b>35</b>
                                <ul class="dare-details__donors">
                                    <li><img src="//placehold.it/30x30"></li>
                                    <li><img src="//placehold.it/30x30"></li>
                                    <li><img src="//placehold.it/30x30"></li>
                                    <li><img src="//placehold.it/30x30"></li>
                                    <li><img src="//placehold.it/30x30"></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="dare-single__responses page__box">
                    <h2 class="page__header--dividing zeta">Responses</h2>

                    <ul class="list-unstyled">
                        <li class="flag flag--top">
                            <div class="flag__img">
                                <img src="//placehold.it/50x50" alt="">

                                <div class="legit-submissions__shares">
                                    <div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-width="100" data-layout="box_count" data-action="like" data-show-faces="false" data-share="true"></div>
                                </div>
                            </div>
                            <div class="legit-submission flag__body">
                                <span class="author"><b>Jesse Montano<b> <small>2d 3h ago</small></span>
                                <p>BOOM! My face itched and burned for almost a month but it was worth it! Keep on pushing on for Paws 4 You Rescue.</p>

                                <figure class="flex-video">
                                    <iframe src="//www.youtube.com/embed/EdM_u5y5m5A" frameborder="0" allowfullscreen></iframe>
                                </figure>

                                <footer class="legit-meta row">
                                    <div class="small-12 column">
                                        <span class="legit-meta__comments">15 comments</span>
                                    </div>
                                </footer>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="small-12 medium-5 large-4 column">
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
                            <input class="button expand" type="submit" value="Donate Now">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    @include('modals.challenge-friends')
    @include('modals.dare-post')
@show
