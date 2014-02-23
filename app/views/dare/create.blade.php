@extends('layouts.master');

@section('content')

    @if($errors->count())
    <?php var_dump($errors); ?>
    <div data-alert class="alert-box warning">
        <strong>Error!</strong>
        @foreach ($errors as $error)
        <?php var_dump($error); ?>
        {{ 'debug' }}
        @endforeach
        <a href="#" class="close">&times;</a>
    </div>
    @endif

    <main class="page">
        <div class="dare-create row">
            <div class="small-12 medium-7 large-8 column">
                <div class="page__box">
                    <header>
                        <h1 class="page__title"><small class="expand">Step 1 of 2:</small> Create your dare</h1>
                        <p>Insert your basic dare details. Be creative on your dare but not offensive. Remember it's #YOLOFAC not #DEADat21.</p>
                    </header>

                    {{ Form::open(array('url' => 'dare/submit', 'class' => 'create-dare-form')) }}
                    <fieldset>
                        <h2 class="create-dare-form__step epsilon" data-step="1">Configure your donation</h2>
                        <p class="milli">Insert your maximum of donation amount</p>

                        <div class="dare-config row collapse text-center">
                            <div class="dollar-helper">$</div>
                            <div class="small-3 column">
                            {{ Form::text('donation_amount', '1', array('id' => 'donation_amount', 'class' => 'big radius js-donation-amount')) }}
                            {{ Form::label('donation_amount', 'Donation Amount', array('class' => 'milli')) }}
                            </div>
                            <div class="small-1 column">
                                <span class="create-dare-form__mathsymbol" aria-label="times">x</span>
                            </div>
                            <div class="small-3 column">
                            {{ Form::text('donation_quantity', '1', array('id' => 'donation_quantity', 'class' => 'big radius js-donation-quantity')) }}
                            {{ Form::label('donation_quantity', 'Maximum Responses', array('class' => 'milli')) }}
                            </div>
                            <div class="small-1 column">
                                <span class="create-dare-form__mathsymbol" aria-label="equals">=</span>
                            </div>
                            <div class="small-4 column">
                            {{ Form::text('donation-total', '?', array('class' => 'big radius js-donation-total')) }}
                            {{ Form::label('donation-total', 'Maximum Donation', array('class' => 'milli')) }}
                            </div>
                        </div>

                        <ul class="dare-charities small-block-grid-4">
                            <li>
                                <img class="is-active" src="//placehold.it/50x50" alt="">
                                <span class="dare-charities__charity-name milli">National Sierra Club</span>
                            </li>
                            <li>
                                <img src="//placehold.it/50x50" alt="">
                                <span class="dare-charities__charity-name milli">Boys &amp; Girls Club</span>
                            </li>
                            <li>
                                <img src="//placehold.it/50x50" alt="">
                                <span class="dare-charities__charity-name milli">Take Stock in Children</span>
                            </li>
                            <li>
                                <img src="//placehold.it/50x50" alt="">
                                <span class="dare-charities__charity-name milli">Big Brothers of Miami</span>
                            </li>
                        <ul>
                    </fieldset>

                    <fieldset>
                        <h2 class="create-dare-form__step epsilon" data-step="2">Create your dare</h2>

                        {{ Form::text('title', null, array('id' => 'title', 'class' => 'radius', 'placeholder' => 'Insert your dare title&hellip;')) }}

                        {{ Form::textarea('excerpt', null, array(
                            'class' => 'radius',
                            'placeholder' => 'Insert your short description. Be short and sweet, just like a tweet&hellip;')) }}

                        <div class="media-submission-fieldset">
                            <div class="create-date-form__media-submit">
                                <h3 class="create-dare-form__headline">Insert an example of your dare <small class="end zeta">(Optional)</small></h3>

                                <div class="row collapse">
                                    <div class="small-8 column">
                                        {{ Form::text('media-url', null, array('class' => 'radius js-media-url', 'placeholder' => 'Insert a video example&hellip;')) }}
                                    </div>
                                    <div class="small-4 column">
                                        <a href="#" class="button secondary postfix js-embed-media ">Preview</a>
                                    </div>
                                    <div class="small-12 column">
                                        <div class="text-center milli">
                                            You can insert links to videos from YouTube, Vine or Instragram.
                                        </div>
                                    </div>
                                </div>

                                <div class="create-dare-form__media-divider">
                                    <span class="round">or</span>
                                </div>

                                <ul class="create-dare-form__media-actions small-block-grid-1 medium-block-grid-2">
                                    <li class="file-input-replace">
                                        <a class="button secondary small expand" href="#">Upload a picture</a>
                                        <input class="button secondary small expand" id="dare-media" type="file" name="files[]" data-url="{{ URL::to('dare/media') }}">
                                    </li>
                                    <li>
                                        <a class="button secondary small expand" href="#">Choose a photo on Facebook</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="media-submission-upload" style="display:none;">
                                <div class="progress round">
                                  <span class="meter" style="width: 0"></span>
                                </div>
                            </div>

                            <div class="create-dare-form__media-preview" style="display:none;">
                                <h3 class="create-dare-form__headline">Insert an example of your dare <small class="end zeta">(Optional)</small></h3>
                                <div class="create-dare-form__media-preview-container">
                                    <div class="flag">
                                        <div class="flag__img">
                                            <img src="//placehold.it/100x100" alt="">
                                        </div>
                                        <div class="flag__body">
                                            picture_file_name.jpg
                                            <a href="#" class="js-media-cancel" aria-label="Cancel">x</a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <hr>
                        {{ Form::hidden('media-picture', null, array('class' => 'big js-media-picture-url')) }}

                        {{ Form::submit('Confirm your PayPal details', array('class' => 'button expand')) }}
                    </fieldset>

                    {{ Form::close() }}
                </div>
            </div>

            <div class="medium-5 large-4 column js-sticky">
                <blockquote class="dare-preview">
                    <p>
                        I pledge to donate
                        $<strong class="how-much">{{ number_format(1) }}</strong>
                        <span class="only-one">for</span>
                        <span class="more-than-one hide">for each of the first <span class="mto-num">2</span> challengers that</span>
                        <strong class="dare-what">...</strong>.
                    </p>
                    <footer class="flag">
                        <div class="flag__img">
                            <img src="{{ Auth::user()->services()->first()->service_picture}}" alt="" width="50">
                        </div>
                        <div class="author flag__body">
                            <cite class="author__name">{{Auth::user()->name}}</cite>
                            <span class="author__location">Miami, FL</span>
                        </div>
                    </footer>
                </blockquote>
            </div>
        </div>
    </main>
@show
