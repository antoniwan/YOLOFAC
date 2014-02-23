@extends('layouts.master');

@section('content')
    <main class="dare-single page">
        <div class="row">
            <div class="small-12 medium-7 large-8 column">
                <div class="page__box--flat-bottom">
                    <header class="dare-single__header">
                        <div class="flag flag--top">
                            <div class="flag__img"><img src="{{ $charity->media }}" alt="" width="50" height="50"></div>
                            <div class="author flag__body">
                                <strong class="author__name">{{ $charity->name }}</strong>
                                <span class="author__location">Miami, FL</span>
                                <hr />
                                <p class="">
                                    {{ $charity->mission }}
                                </p>
                            </div>
                        </div>
                    </header>

                    <ul class="dare-single__actions small-block-grid-2">
                        <li>
                            <span class="dare-details__title">Money Donated</span>
                            <div class="round-box large">
                                <b>${{$total_raised}}</b>
                            </div>
                        </li>
                       <li>
                            <span class="dare-details__title">Dares</span>
                            <div class="round-box large">
                                @if($charity->responses()->count())
                                    <b>{{ $charity->responses()->count() }} responders</b>
                                @endif
                            </div>
                        </li>
                    </ul>
                </div>

            </div>

            <div class="small-12 medium-5 large-4 column js-sticky">
                <div class="dare-details page__box">
                    <div class="dare-details__mod">
                        <b class="dare-details__title">Feeling charitable?</b>
                        <p>Donate to this cause here.</p>

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
@show
