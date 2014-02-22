<?php

class Media extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'medias';

	public function dare()
	{
		return $this->belongsTo('Dare');
	}

}