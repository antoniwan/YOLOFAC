<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');


	/**
	 * Verify if a user with the received service is already inside the database
	 *
	 * @return User
	 */
	public static function verifyUserByService($user_service)
	{
		if(!$user_service)
            return false;

        $user = User::whereHas('services', function($query) use ($user_service){
            $query->where('service_id', $user_service['service_id'])->where('service_name', $user_service['service_name']);
        })->limit(1)->get();


        if(!$user = $user->first()) {
        	$user = new User;

        	$user->name = $user_service['user_name'];
            $user->email = $user_service['user_email'];
        	$user->type = 'regular';

        	if($user->save()){
        		$service = new Service;

	        	$service->service_id = $user_service['service_id'];
	        	$service->service_name = $user_service['service_name'];
	        	$service->service_picture = $user_service['service_picture'];

	        	$user->services()->save($service);

                // Welcome Email!
                // if user registers with twitter, we can't send him an email
                // because we won't have it
                if($service->service_name != 'twitter')
                {
                    $data = array('name' => $user->name, 'id' => $user->id, 'email' => $user->email);
                    Mail::send('emails.welcome', $data, function($message) use ($user) {
                        $message
                            ->to($user->email, $user->name)
                            ->subject('#YOLO for a Cause welcomes you!');
                    });
                }

        	}

            Session::put('register', true);
        }

    	Auth::login($user);

        return Auth::user();

	}

	/**
     * Defines relationship with Service object
     *
     * @return Service
     */
	public function services()
	{
		return $this->hasMany('Service');
	}

	/**
     * Defines relationship with Dare object
     *
     * @return Dare
     */
	public function dares()
	{
		return $this->hasMany('Dare');
	}

    /**
     * Defines relationship with Response object
     *
     * @return Response
     */
    public function responses()
    {
        return $this->hasManyThrough('YoloResponse', 'Dare');
    }

	/**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }

    /**
     * Get the e-mail address where password reminders are sent.
     *
     * @return string
     */
    public function getReminderEmail()
    {
        return $this->email;
    }

}