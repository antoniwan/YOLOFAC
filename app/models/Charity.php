<?php


class Charity extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'charities';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('');


	/**
     * Defines relationship with Dare object
     *
     * @return Dare
     */
	public function dares()
	{
		return $this->hasMany('Dare');
	}

    public function donations()
    {
        return $this->hasMany('Donation');
    }

}