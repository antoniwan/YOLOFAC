<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::get('/', array('as' => 'home', 'uses' => 'AppController@showIndex'));
// Route::get('/register', array('as' => 'register', 'uses' => 'AppController@showRegister'));
Route::get('dashboard', array('as' => 'dashboard', 'uses' => 'AppController@showDashboard'));
Route::get('how', array('as' => 'faq', function(){
	return 'need to do this view';
}));
/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
|
| Here are all the routes that have to do with authenticating, registering the user.
|
*/
Route::get('signin', array('as' => 'register', 'uses' => 'AppController@showRegister'));
Route::get('oauth', 'AppController@oauth');
Route::get('logout', array('as' => 'logout', function() {
	Auth::logout();
	return Redirect::to('/');
}));

/*
|--------------------------------------------------------------------------
| Dare Routes
|--------------------------------------------------------------------------
|
| Here are all the routes that have to do with creating, seeing and modifying dares.
|
*/
Route::group(array('prefix' => 'dare'), function(){
	Route::get('create', array('before' => 'auth', 'as' => 'dare.create', 'uses' => 'DareController@showDareCreate'));
    Route::post('submit', array('before' => 'auth', 'uses' => 'DareController@submitDare'));
    Route::post('media', 'DareController@media');
    Route::post('getInstagram', 'DareController@getInstagram');
	Route::get('all', array('as' => 'dare.show.all', 'uses' => 'DareController@makeDares'));
    // send twilio SMS
    Route::post('sendSMS', array('as' => 'dare.send_sms', 'uses' => 'DareController@sendSMS'));

    // send sendgrid dare email
    Route::post('sendDareEmail', array('as' => 'dare.send_email', 'uses' => 'DareController@sendDareEmail'));
    Route::get('/show/{id?}', array('as' => 'dare.single', 'uses' => 'DareController@showDare'));
    Route::get('/test', 'DareController@test_media');
    Route::get('/test_payment', 'DareController@testPaypal');
});


/*
|--------------------------------------------------------------------------
| Payment Routes
|--------------------------------------------------------------------------
|
| Here are all the routes that have to do with payments
|
*/
Route::group(array('prefix' => 'payment'), function(){
	Route::get('/success', function(){
		if(Payment::successfulPayment())
			return Redirect::to('/dare/show/' . Session::get('dare_id'));
	});

	Route::get('/cancel', function(){
		var_dump(Input::all());
	});

	Route::get('/test_capture', function(){
		Payment::capturePaymentAuthorization();
	});

	Route::get('/test_authorization', function(){
		Payment::getPaymentAuthorization();
	});

});

/*
|--------------------------------------------------------------------------
| Response Routes
|--------------------------------------------------------------------------
|
| Here are all the routes that have to do with payments
|
*/
Route::group(array('prefix' => 'response'), function(){
	Route::post('/submit', 'ResponseController@submit');
	Route::get('/approve/{id?}', 'ResponseController@approve');
});

/*
|--------------------------------------------------------------------------
| Charity Routes
|--------------------------------------------------------------------------
|
| Here are all the routes that have to do with creating, seeing and modifying charities.
|
*/
Route::group(array('prefix' => 'charities'), function(){
	Route::get('/', array('as' => 'charity.all', 'uses' => 'CharityController@showIndex'));
	Route::get('show/{id?}', array('as' => 'charity.single', 'uses' => 'CharityController@showCharity'));
});

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/
Route::group(array('prefix' => 'api'), function() {
	Route::get('/', function(){
		return Response::json(array('you_are_lost' => true));
	});
	Route::get('charities', 'CharityController@listAll');
	Route::get('charities/all', 'CharityController@listAll');
	Route::get('dares', 'DareController@listAll');
	Route::get('dares/all', 'DareController@listAll');
});


// Debug Routes
Route::get('twilio', array('as' => 'twilio', 'uses' => 'AppController@twilioTest'));
Route::get('mailer', array('as' => 'mailer', 'uses' => 'MailerController@index'));
Route::get('mailer/template', array('as' => 'mailer-template-welcome', 'uses' => 'MailerController@makeTemplate'));
Route::get('mailer/template/welcome', array('as' => 'mailer-template-welcome', 'uses' => 'MailerController@makeWelcome'));
Route::get('mailer/template/dare-placed', array('as' => 'mailer-template-dare-placed', 'uses' => 'MailerController@makeDarePlaced'));
Route::get('mailer/template/dare-owned', array('as' => 'mailer-template-dare-owned', 'uses' => 'MailerController@makeDareOwned'));
