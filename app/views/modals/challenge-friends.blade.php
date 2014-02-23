<section id="modal-challenge-friends" class="modal reveal-modal small" data-reveal>
    <header class="modal__header">
        <h1 class="zeta">Challenge a friend</h1>
    </header>
    <div class="modal__content">
        <div id="challenge-sms" class="modal__row row">
            <div class="medium-7 column">
                <label for="challenge-mobile-num">Challenge a friend with a text message</label>
                <input type="text" id="challenge-mobile-num" placeholder="Insert your friend's mobile number">
            </div>
            <div class="medium-5 column">
                <a class="button radius small expand valign-bottom" href="#">Send</a>
            </div>
        </div>

        <div id="challenge-email" class="modal__row row" data-dareid="{{ $dare->id }}">
            <div class="medium-7 column">
                <label for="challenge-email">Challenge a friend with an email</label>
                <input type="text" id="challenge-email" placeholder="Insert your friend's email address">
            </div>
            <div class="medium-5 column">
                <a class="button radius small expand valign-bottom" href="#">Send</a>
            </div>
        </div>

        <div id="challenge-fbinvite" class="modal__row row">
            <div class="medium-7 column">
                <span class="modal__line">Challenge a friend on Facebook</span>
            </div>
            <div class="medium-5 column">
                <a class="btn-social--facebook expand" href="#">Challenge</a>
            </div>
        </div>

        <div id="challenge-tweet" class="modal__row row">
            <div class="medium-7 column">
                <span class="modal__line">Challenge a friend on Twitter</span>
            </div>
            <div class="medium-5 column">
                <a class="btn-social--twitter expand" href="#">Challenge</a>
            </div>
        </div>

        <div id="challenge-fbshare" class="modal__row row">
            <div class="medium-7 column">
                <span class="modal__line">Share this challenge</span>
            </div>
            <div class="medium-5 column">
                <ul class="shares-group button-group expand">
                    <li><a class="button btn-social--facebook is-icon" href="#">Facebook</a></li>
                    <li><a class="button btn-social--twitter is-icon" href="https://twitter.com/intent/tweet?text={{urlencode('I dare you to do something crazy! Help me support a local non-profit by doing a crazy stunt.
#YOLOFAC')}}">Twitter</a></li>
                    <li><a class="button btn-social--google is-icon" href="">Google</a></li>
                </ul>
            </div>
        </div>
    </div>

    <a class="close-reveal-modal" href="#" arial-label="Close">x</a>
</section>
