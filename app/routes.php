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
Route::get('/register', array('as' => 'register', 'uses' => 'AppController@showRegister'));


// Debug Routes
Route::get('/mailer', array('as' => 'mailer', 'uses' => 'MailerController@index'));
Route::get('/mailer/template', array('as' => 'mailer-template', 'uses' => 'MailerController@makeTemplate'));
Route::get('/', array('as' => 'index', 'uses' => 'AppController@showIndex'));

Route::get('test', 'AppController@test');

Route::get('oauth', 'AppController@oauth');

Route::get('logout', function() {

	Auth::logout();

	return Redirect::to('test');

});
