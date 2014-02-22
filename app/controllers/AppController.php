<?php

class AppController extends BaseController {

    protected $layout = 'layouts.master';

    public function showIndex()
    {
        $this->layout->content = View::make('index', $this->data);
    }

    public function showRegister()
    {

    	if(Auth::check())
    		return Redirect::to('user');


    	$this->data['service_urls'] = array(
			'facebook' =>  Service::retrieveLoginUrl('facebook')
		);

        $this->layout->content = View::make('register', $this->data);
    }

	public function showUserPage()
	{
		if(!Auth::check())
			return Redirect::to('/register');

		var_dump(Auth::user());
	}

	public function oauth()
	{
		$user = Service::serviceCallback();

		if($user && Auth::check())
			return Redirect::to('/user');
	}

}
