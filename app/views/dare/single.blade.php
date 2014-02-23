@extends('layouts.master');

@section('content')
    <main class="dare-single page">
        <div class="row">
            <div class="small-12 medium-7 large-8 column">
                <div class="page__box">
                    <header>
                        <div class="flag flag--top">
                            <div class="flag__img"><img src="{{ $dare['user']['service']->service_picture }}" alt="" width="50" height="50"></div>
                            <div class="author flag__body">
                                <strong class="author__name">{{ $dare['user']->name }}</strong>
                                <span class="author__location">Miami, FL</span>
                            </div>
                        </div>

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
                    </header>

                    <ul class="dare-single__actions small-block-grid-2">
                        <li>
                            <a class="button radius expand" href="#modal-dare-post" data-reveal-id="modal-dare-post" data-reveal>
                                <strong>Post your evidence</strong> and make him pay!
                            </a>
                        </li>
                       <li>
                            <a class="button radius expand" href="#modal-challenge-friends" data-reveal-id="modal-challenge-friends" data-reveal>
                                <strong>Dare someone</strong> to DO IT!
                            </a>
                        </li>
                    </ul>

                    <ul class="legit-submissions-group">
                        <li class="flag flag--top">
                            <div class="flag__img"><img src="//placehold.it/50x50" alt=""></div>
                            <div class="legit-submission flag__body">
                                <span class="author"><b>Jesse Montano<b> <small>2d 3h ago</small></span>
                                <p>BOOM! My face itched and burned for almost a month but it was worth it! Keep on pushing on for Paws 4 You Rescue.</p>

                                <figure class="flex-video">
                                    <iframe src="//www.youtube.com/embed/EdM_u5y5m5A" frameborder="0" allowfullscreen></iframe>
                                </figure>

                                <footer class="legit-meta row">
                                    <div class="large-3 column">
                                        <span class="legit-meta__comments">15 comments</span>
                                    </div>
                                    <div class="large-3 column">
                                        <div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-width="100" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>
                                    </div>
                                    <div class="large-6 column">
                                        <ul class="shares-group button-group right">
                                            <li><a class="button btn-social--facebook is-icon" href="#">Facebook</a></li>
                                            <li><a class="button btn-social--twitter is-icon" href="#">Twitter</a></li>
                                            <li><a class="button btn-social--google is-icon" href="#">Google</a></li>
                                        </ul>
                                    </div>
                                </footer>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="small-12 medium-5 large-4 column">
                <div class="dare-details page__box--dark">
                    <div class="dare-details__mod">
                        <span class="dare-details__title">Money Donated</span>
                        <div class="round-box large">
                            <b>$200</b>
                        </div>
                    </div>
                    <div class="dare-details__mod">
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
