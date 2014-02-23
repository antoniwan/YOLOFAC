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

		if (strpos($url, 'vine.co') !== FALSE){
			$embedded = '<iframe class="vine-embed" src="' . $url . '/embed/simple" width="480" height="480" frameborder="0"></iframe><script async src="//platform.vine.co/static/scripts/embed.js" charset="utf-8"></script>';
		}else if (strpos($url, 'youtube.com') !== FALSE)
		    echo "Youtube!";
		else if (strpos($url, 'instragram.com') !== FALSE)
			echo "Instragram!";

		return $embedded;

	}

	public function dare()
	{
		return $this->belongsTo('Dare');
	}

}