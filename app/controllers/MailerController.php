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
		return View::make('emails.auth.welcome');
	}


}