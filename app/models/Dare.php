<?php

class Dare extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'dares';

	 //Validation rules for Dares
    protected static $rules = array(
        'title' => 'required',
        'description' => 'required',
        'excerpt' => 'required|max:140',
        'donation_amount' => 'required|numeric',
        'donation_quantity' => 'required|numeric'
    );

    public static function validate($dare_submission)
    {
    	$validator = Validator::make($dare_submission, self::$rules);

    	if($validator->fails()){
    		return $validator;
    	}else {
    		$dare = new Dare;
    		$dare->title = $dare_submission['title'];
    		$dare->excerpt = $dare_submission['excerpt'];
    		$dare->description = $dare_submission['description'];
    		$dare->donation_amount = $dare_submission['donation_amount'];
    		$dare->donation_quantity = $dare_submission['donation_quantity'];

    		Auth::user()->dares()->save($dare);

    		return true;
    	}
    }

	public function user()
	{
		return $this->belongsTo('User');
	}

	public function medias()
	{
		return $this->hasMany('Media');
	}

}