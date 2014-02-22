<?php

class AppController extends BaseController {

    protected $layout = 'layouts.master';

    public function showIndex()
    {
        $this->layout->content = View::make('index', $this->data);
    }

    public function showRegister()
    {
        $this->layout->content = View::make('register', $this->data);
    }

	public function test()
	{

		if(Auth::check()){
			var_dump(Auth::user());
		} else {

			$this->data['service_urls'] = array(
				'facebook' =>  Service::retrieveLoginUrl('facebook')
			);

			$this->layout->content = View::make('test.index', $this->data);
		}
	}

	public function oauth()
	{
		$user = Service::serviceCallback();

		if($user && Auth::check())
			return Redirect::to('test');
	}

}
