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
Route::get('/user', array('as' => 'user_page', 'uses' => 'AppController@showUserPage'));
Route::get('/how', array('as' => 'faq', function(){
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
Route::get('/signin', array('as' => 'register', 'uses' => 'AppController@showRegister'));
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
    Route::get('/show/{id?}', array('as' => 'dare.single', 'uses' => 'DareController@showDare'));
    Route::get('/test', 'DareController@test_media');
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
	Route::get('/', 'CharityController@showIndex');
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
Route::get('/twilio', array('as' => 'twilio', 'uses' => 'AppController@twilioTest'));
Route::get('/mailer', array('as' => 'mailer', 'uses' => 'MailerController@index'));
Route::get('/mailer/template', array('as' => 'mailer-template-welcome', 'uses' => 'MailerController@makeTemplate'));
Route::get('/mailer/template/welcome', array('as' => 'mailer-template-welcome', 'uses' => 'MailerController@makeWelcome'));
Route::get('/mailer/template/dare-placed', array('as' => 'mailer-template-dare-placed', 'uses' => 'MailerController@makeDarePlaced'));
Route::get('/mailer/template/dare-owned', array('as' => 'mailer-template-dare-owned', 'uses' => 'MailerController@makeDareOwned'));
