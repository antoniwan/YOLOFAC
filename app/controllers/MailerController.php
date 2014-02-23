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
		echo 'send-grid, oh behave!';

		Mail::send('emails.welcome', array('name' => 'Juanito'), function($message)
		{
			$message
				->to('antonio@nobox.com', 'Antonio Rodríguez')
				->subject('#YOLO for a Cause welcomes you!');

			return 'mail sent';
		});



	}

	public function makeTemplate()
	{
		return View::make('emails.welcome', array('name' => 'Juanito Caradequeso'));
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