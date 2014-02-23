<?php

class Donation extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'donations';

	public function user()
	{
		return $this->belongsTo('User');
	}

	public function charities()
	{
		return $this->belongsTo('Charity');
	}

}