<?php

class Media extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'medias';

	public static function getEmbeddedData($url)
	{

		$embedded = null;

		if (strpos($url, 'youtube.com') !== FALSE)
		    $embedded = $url;


		return $embedded;

	}

	public function dare()
	{
		return $this->belongsTo('Dare');
	}

}