<?php

class Dare extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'dares';

	public function user()
	{
		return $this->belongsTo('User');
	}

	public function medias()
	{
		return $this->hasMany('Media');
	}

}