@extends('layouts.master')

@section('content')
    <main class="dashboard page">
        <div class="row">
            <div class="small-12 medium-8 column">
                <section class="page__box">
                    <h1 class="page__header--dividing zeta">My Dares</h1>

                    @for ($i = 0; $i < 8; $i++)
                    <div class="dashboard__dares">
                        <div class="row collapse">
                            <div class="small-12 medium-6 column vcenter">
                                <div class="dare-actions vcenter-inner">
                                    <span class="dare-actions__dare-title">Dare Title</span>
                                    <small><a href="#">Edit</a></small>
                                </div>
                            </div>
                            <div class="small-12 medium-6 column">
                                <div class="dare-history flag">
                                    <div class="dare-history__total flag__img">
                                        <strong>$10</strong>
                                    </div>
                                    <div class="dare-history__responders flag__body">
                                        <span class="dare-history__responders__amount">35</span>
                                        <img src="//placehold.it/25x25" alt="">
                                        <img src="//placehold.it/25x25" alt="">
                                        <img src="//placehold.it/25x25" alt="">
                                        <img src="//placehold.it/25x25" alt="">
                                        <img src="//placehold.it/25x25" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endfor
                </section>

                <section class="page__box">
                    <h1 class="page__header--dividing zeta">Pending Responses</h1>

                    <div class="dashboard__response flag--top">
                        <div class="flag__img">
                            <img src="//placehold.it/50x50" alt="">
                        </div>
                        <div class="legit-submission flag__body">
                            <span class="author"><b>Jesse Montano<b> <small>2d 3h ago</small></span>
                            <p>BOOM! My face itched and burned for almost a month but it was worth it! Keep on pushing on for Paws 4 You Rescue.</p>

                            <figure class="flex-video">
                                <iframe src="//www.youtube.com/embed/EdM_u5y5m5A" frameborder="0" allowfullscreen></iframe>
                            </figure>

                            <footer class="legit-meta row">
                                <div class="small-12 medium-6 column">


                                </div>
                                <div class="small-12 medium-6 column">
                                    <a class="button radius expand" href="#">Seems legit! Approve</a>
                                </div>
                            </footer>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </main>
@show
