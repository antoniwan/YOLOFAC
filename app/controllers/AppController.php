<?php

class AppController extends BaseController {

    protected $layout = 'layouts.master';

    public function showIndex()
    {
        $this->data['charities'] = Charity::all();
        $this->layout->content = View::make('index', $this->data);
    }

    public function showRegister()
    {

        if(Auth::check())
            return Redirect::to('user');


        $this->data['service_urls'] = array(
            'twitter' =>  Service::retrieveLoginUrl('twitter'),
            // 'paypal' =>  Service::retrieveLoginUrl('paypal'),
            'facebook' =>  Service::retrieveLoginUrl('facebook'),
            'google' =>  Service::retrieveLoginUrl('google')
        );

        $this->layout->content = View::make('register', $this->data);
    }

    public function showUserPage()
    {
        if(!Auth::check())
            return Redirect::to('/signin');

        echo "<pre>";
        var_dump(Auth::user());
        echo "</pre>";
    }

    public function oauth()
    {
        $user = Service::serviceCallback();

        if($user && Auth::check() && Session::get('register')){
            Session::forget('register');
            return Redirect::to('/dare/create');
        } else if($user && Auth::check())
            return Redirect::to('/');
    }

    public function twilioTest()
    {
        // testing the twilio API
        $sid = Config::get('twilio.sid');
        $token = Config::get('twilio.token');
        $twilio_number = Config::get('twilio.phone_number');
        $client = new Services_Twilio($sid, $token);
        $message = $client->account->messages->sendMessage(
            $twilio_number,
            '3055884688',
            'This is a test!'
        );
        return 'twilio sms sent!';
    }

    public function showDashboard ()
    {
        $this->layout->content = View::make('dashboard', $this->data);
    }
}
