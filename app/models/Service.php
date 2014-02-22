<?php

class Service extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'services';


	private static function initiateService($service)
	{
		$config = Config::get("services.{$service}");
		$redirect_uri = Config::get("services.redirect_uri");

		$storage = new OAuth\Common\Storage\Session();

		$credentials = new OAuth\Common\Consumer\Credentials(
			$config['app_id'],
		    $config['app_secret'],
		    $redirect_uri . "?e_service={$service}"
		);

		$serviceFactory = new \OAuth\ServiceFactory();

		return $serviceFactory->createService($service, $credentials, $storage, $config['scope']);

	}

	public static function retrieveLoginUrl($service_name = null)
	{
		if(!$service_name)
			return false;

		$uri_params = array(
            'state' => 'DCEEFWF45453sdffef424',
        );


		$service = self::initiateService($service_name);

		if($service_name == 'twitter'){
            $uri_params['oauth_token'] = $service->requestRequestToken();
            $uri_params['oauth_token'] = $uri_params['oauth_token']->getRequestToken();
        }

		return $service->getAuthorizationUri($uri_params);
	}

	public static function serviceCallback()
	{
		if(!Input::has('code') && !Input::has('oauth_token') && !Input::has('e_service'))
			return false;

		$service = self::initiateService(Input::get('e_service'));


		if(Input::has('code')){
			$token = $service->requestAccessToken(Input::get('code'));
		} else if( Input::has('oauth_token') && Input::get('e_service') == 'twitter') {

			$storage = new OAuth\Common\Storage\Session();

            $token = $storage->retrieveAccessToken('Twitter');

            $service->requestAccessToken(
                Input::get('oauth_token'),
                input::get('oauth_verifier'),
                $token->getRequestTokenSecret()
            );
		}

		switch (Input::get('e_service')) {
			case 'facebook':
				$result = json_decode($service->request('/me'), true);

				$user = array(
					'service_name' => 'facebook',
					'user_name' => $result['name'],
					'service_id' => $result['id'],
					'service_picture' => "//graph.facebook.com/{$result['id']}/picture?width=500&height=500",
					'user_email' => $result['email']
				);

				break;

			case 'google':
				$result = json_decode($service->request('https://www.googleapis.com/oauth2/v1/userinfo'), true);

				$user = array(
                    'service_name' => 'google',
                    'service_id' => $result['id'],
                    'user_name' => $result['name'],
                    'service_picture' => str_replace("sz=50", "sz=500", $result['picture']),
                    'user_email' => $result['email']
                );

				break;

			case 'twitter':
				$result = json_decode($service->request('account/verify_credentials.json'));

				$user = array(
                    'service_name' => 'twitter',
                    'service_id' => $result->id,
                    'user_name' => $result->name,
                    'service_picture' => str_replace("_normal", "", $result->profile_image_url),
                    'user_email' => null
                );

				break;

			case 'paypal':
				$result = json_decode($service->request('/identity/openidconnect/userinfo/?schema=openid'), true);
				echo "<pre>";
				var_dump($result);
				echo "</pre>";

				// $user = array(
    //                 'service_name' => 'twitter',
    //                 'service_id' => $result->id,
    //                 'user_name' => $result->name,
    //                 'service_picture' => str_replace("_normal", "", $result->profile_image_url),
    //                 'user_email' => null
    //             );

				break;

			default:
				$user = null;
				break;
		}

		return User::verifyUserByService($user);
	}


	public function user()
	{
		return $this->belongsTo('User');
	}

}