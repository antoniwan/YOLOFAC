@extends('layouts.master')

@section('content')

    <main class="dashboard page">

        @if(isset($capture_dare))
            "YOU JUST PAID FOR A RESPONSE IN FARE ID: " {{$capture_dare->id}}
        @endif

        <div class="row">
            <div class="small-12 medium-8 column">
                <section class="page__box">
                    <h1 class="page__header--dividing zeta">My Dares</h1>


                    @foreach($dares as $dare)

                    <div class="dashboard__dares">
                        <div class="row collapse">
                            <div class="small-12 medium-6 column vcenter">
                                <div class="dare-actions vcenter-inner">
                                    <a href="{{URL::to('dare/show/' . $dare->id )}}"><span class="dare-actions__dare-title">{{$dare->title}}</span></a>
                                    <small><a href="#">Edit</a></small>
                                </div>
                            </div>
                            <div class="small-12 medium-6 column">
                                <div class="dare-history flag">
                                    <div class="dare-history__total flag__img">
                                        <strong>${{$dare->getTotalRaised()}}</strong>
                                    </div>
                                    <div class="dare-history__responders flag__body">
                                        <span class="dare-history__responders__amount">{{$dare->responses()->count()}}</span>
                                        <?php $count = 0; ?>
                                        @foreach($dare->responses as $response)
                                            <?php
                                                if($count > 5)
                                                    break;
                                            ?>
                                            <img src="//placehold.it/25x25" alt="">
                                            <?php $count++; ?>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </section>

                <section class="page__box">

                    @if($responses->count())
                        <h1 class="page__header--dividing zeta">Pending Responses</h1>
                        <div class="dashboard__response flag--top">
                            @foreach($responses as $resp)
                                <?php
                                    if($resp->user_id)
                                        $user = User::find($resp->user_id);
                                ?>
                                <div class="flag__img">
                                    @if($user)
                                        <img src="{{$user->services->first()->service_picture}}" alt="" width="50">
                                    @else
                                        <img src="//placehold.it/50x50" alt="">
                                    @endif
                                </div>
                                <div class="legit-submission flag__body">
                                    @if($user)
                                        <span class="author"><b>{{$user->name}}<b> <small>2d 3h ago</small></span>
                                    @else
                                        <span class="author"><b>Anonymous<b> <small>2d 3h ago</small></span>
                                    @endif

                                    <p>{{$resp->comments}}</p>

                                    <figure class="flex-video">
                                        <iframe src="//www.youtube.com/embed/{{ Media::getYoutubeEmebbed($resp->video_url)}}" frameborder="0" allowfullscreen></iframe>
                                    </figure>

                                    <footer class="legit-meta row">
                                        <div class="small-12 medium-6 column">


                                        </div>
                                        <div class="small-12 medium-6 column">
                                            <a class="button radius expand" href="{{URL::to('response/approve/' . $resp->id)}}">Seems legit! Approve</a>
                                        </div>
                                    </footer>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <h1 class="page__header--dividing zeta">No Pending Responses</h1>
                    @endif




                </section>
            </div>
        </div>
    </main>
@show
