@extends('layouts.master');

@section('content')
    <main class="page row">
        <div class="row">
            <div class="medium-7 large-8 column">
                <header>
                    <h1 class="page__title">Sign in to create a #YOLO dare</h1>
                    <p>Register with any of your social networks to start creating your #YOLO Dare and start daring your friends.</p>
                </header>

                <ul class="social-btn-group list-unstyled small-block-grid-2">
                    <li>
                        <a class="button btn-social--facebook" href="{{ $service_urls['facebook'] }}">Facebook</a>
                    </li>
                    <li>
                        <a class="button btn-social--twitter" href="#">Twitter</a>
                    </li>
                    <li>
                        <a class="button btn-social--google" href="#">Google</a>
                    </li>
                </ul>
                <p>We won't share your information with any third-party or send you any spam.</p>
            </div>

            <div class="medium-5 large-4 column">
                <p class="lead">People already do crazy stuff and share them on the internet, why not back them up for good causes!</p>
                <p>Dare your friends to do something and commit to donate to a charity for each completed dare.</p>
            </div>
        </div>
    </main>
@show
