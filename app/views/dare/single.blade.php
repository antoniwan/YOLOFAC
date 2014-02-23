@extends('layouts.master');

@section('content')
    <main class="dare-single page">
        <div class="row">
            <div class="small-12 medium-7 large-8 column">
                <div class="page__box">
                    <header>
                        <div class="flag flag--top">
                            <div class="flag__img"><img src="//placehold.it/50x50" alt=""></div>
                            <div class="author flag__body">
                                <strong class="author__name">Waldemar Figueroa</strong>
                                <span class="author__location">Miami</span>
                            </div>
                        </div>

                        <h2 class="dare-single__challenge">I pledge to donate <strong>$5 dollars</strong> for every person that <strong>swallows a spoonful of cinnamon</strong> for <strong>Paws 4 You Rescue</strong>.</h2>
                    </header>

                    <ul class="dare-single__actions small-block-grid-2">
                        <li>
                            <a class="button radius expand" href="#">
                                <strong>Post your dare video</strong> and make him pay!
                            </a>
                        </li>
                       <li>
                            <a class="button radius expand" href="#modal-challenge-friends" data-reveal-id="modal-challenge-friends" data-reveal>
                                <strong>Dare a friend</strong> to create a video!
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
                        <span class="dare-details__title">Not that crazy&hellip;</span>
                        <p>You're not #YOLO, may more of a #CrazyinMiami. Don't worry you can also donate to our sponsored cause.</p>

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
@show
