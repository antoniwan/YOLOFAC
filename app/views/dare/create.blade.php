@extends('layouts.master');

@section('content')

    @if($errors->count())
    <?php var_dump($errors); ?>
    @endif


    <main class="page">
        <div class="row">
            <div class="small-12 medium-7 large-8 column">
                <div class="page__box">
                    <header>
                        <h1 class="page__title"><small>Step 1 of 2:</small> Create your #YOLO dare</h1>
                        <p>Insert your basic dare details. Be creative on your dare but not offensive. Remember it's #YOLO not #DEADat21.</p>
                    </header>

                    <h2>Choose your donation pledge</h2>

                    {{ Form::open(array('url' => 'dare/submit', 'class' => 'create-dare-form row')) }}

                    <fieldset class="row collapse">
                        <div class="small-2 column">
                        {{ Form::text('donation_amount', '1', array('class' => 'big')) }}
                        {{ Form::label('donation_amount', 'Donation Amount', array('class' => 'milli')) }}
                        </div>
                        <div class="small-2 column text-center">
                            <span class="create-dare-form__mathsymbol" aria-label="times">x</span>
                        </div>
                        <div class="small-2 column">
                        {{ Form::text('donation_quantity', '&infin;', array('class' => 'big')) }}
                        </div>
                        <div class="small-2 column text-center">
                            <span class="create-dare-form__mathsymbol" aria-label="equals">=</span>
                        </div>
                        <div class="small-4 column">
                        {{ Form::text('donation-total', '?', array('class' => 'big')) }}
                        </div>
                    </fieldset>

                    <fieldset>
                        {{ Form::text('title', null, array('placeholder' => 'Insert your dare title&hellip;')) }}

                        {{ Form::textarea('excerpt', null, array('placeholder' => 'Insert your short description. Be short and sweet, just like a tweet&hellip;')) }}

                        {{ Form::textarea('description', null, array('placeholder' => 'Insert your long description. Lets us know what inspires you to donate&hellip;')) }}

                        {{ Form::select('category', array(
                            '' => 'Select a category'
                        )) }}
                    </fieldset>

                    <fieldset>

                        <div class="media-submission-fieldset">
                            <h3 class="create-dare-form__headline">Insert an example of your dare <small class="end zeta">(Optional)</small></h3>

                            {{ Form::text('media-url', null, array('class' => 'js-media-url', 'placeholder' => 'Insert a video example&hellip;')) }}
                            <a href="#" class="js-embed-media button small">insert</a>
                            <div class="text-center milli">
                                You can insert links to videos from YouTube, Vine or Instragram.
                            </div>

                            <div class="create-dare-form__media-divider">
                                <span>or</span>
                            </div>

                            <div class="create-dare-form__media-preview">
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

                            <ul class="small-block-grid-2">
                                <input class="button small expand" id="dare-media" type="file" name="files[]" data-url="{{ URL::to('dare/media') }}">
                                <li><a class="button small expand" href="#">Choose a photo on Facebook</a></li>
                            </ul>
                        </div>
                        <div class="media-submission-upload" style="display:none;">
                            <div class="progress round">
                              <span class="meter" style="width: 0"></span>
                            </div>
                        </div>

                        <hr>

                        {{ Form::submit('Next Step: Insert your PayPal details', array('class' => 'button right')) }}
                    </fieldset>

                    {{ Form::close() }}
                </div>
            </div>

            <div class="medium-5 large-4 column">


            </div>
        </div>
    </main>
@show
