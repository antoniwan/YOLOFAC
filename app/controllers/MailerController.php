<?php

class MailerController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// Controller for debugging Mailer functionalities
		return 'hi';

	}

	public function makeTemplate()
	{
		return View::make('emails.welcome');
	}

	public function makeWelcome()
	{
		return View::make('emails.welcome');
	}

	public function makeDarePlaced()
	{
		return View::make('emails.betplaced');
	}

	public function makeDareOwned()
	{
		return View::make('emails.owned');
	}


}