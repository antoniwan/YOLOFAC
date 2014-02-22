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

	public static function retrieveLoginUrl($service = null)
	{
		if(!$service)
			return false;

		$service = self::initiateService($service);

		return $service->getAuthorizationUri();
	}

	public static function serviceCallback()
	{
		if(!Input::has('code') || !Input::has('e_service'))
			return false;

		$service = self::initiateService(Input::get('e_service'));


		if(Input::has('code')){
			$token = $service->requestAccessToken(Input::get('code'));
		}

		switch (Input::get('e_service')) {
			case 'facebook':
				$result = json_decode($service->request('/me'), true);

				$user = array(
					'service_name' => 'facebook',
					'user_name' => $result['name'],
					'service_id' => $result['id'],
					'service_picture' => "//graph.facebook.com/{$result['id']}/picture?width=500&height=500",
				);

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